<?php

class ContactsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'userGroupsAccessControl', 
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$relation=ContactsHasGroups::model()->getGroups($id);
		$print='';
		foreach ($relation as $value) {
			$print.= $value->nameGroup.' ';
		}
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'relation'=>$print,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Contacts;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Contacts']))
		{
			if(isset($_POST['Groups']) && $_POST['Groups']!==null){
				$model->attributes=$_POST['Contacts'];
				$model->fk_user = Yii::app()->user->id;
				if($model->save()) {
					foreach ($_POST['Groups'] as $groups) {
						$relation=new ContactsHasGroups;
						$relation->fk_contacts=$model->id;
						$relation->fk_groups=$groups;
						$relation->save();
					}
					$this->redirect(array('view','id'=>$model->id));
				}
			} else {
				Yii::app()->user->setFlash('notice', "Choose the group(s)!");
				$this->redirect(array('create'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$groups=ContactsHasGroups::model()->findAll(array(
			'condition'=>'fk_contacts=:id_contact',
			'params'=>array(':id_contact'=>$model->id),
			'order'=>'id',
		));
		

		$groups_update=array();
		foreach ($groups as $group) {
			$groups_update[] = $group->fk_groups;
		}

		if(isset($_POST['Contacts']))
		{
			$model->attributes=$_POST['Contacts'];
			ContactsHasGroups::model()->deleteAll('fk_contacts=' . $model->id);
			if ($model->save() && isset($_POST['Groups']) && $_POST['Groups']!==null) {
				foreach ($_POST['Groups'] as $group) {
					$relation=new ContactsHasGroups;
					$relation->fk_contacts=$model->id;
					$relation->fk_groups=$group;
					$relation->save();
				}
				$this->redirect(array('view','id'=>$model->id));
			} else {
				Yii::app()->user->setFlash('notice', "Choose the group(s)!");
				$this->redirect(array('update','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'groups'=>$groups_update,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$id=Yii::app()->user->id;
		$relation=Contacts::getGroups($id);
		$print='';
		foreach ($relation as $value) {
			$print.=$value['name'].' ';
		}
		$dataProvider=new Contacts();
		$this->render('index',array(
			'model'=>$dataProvider,
			'relation'=>$print,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Contacts('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Contacts']))
			$model->attributes=$_GET['Contacts'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Contacts the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Contacts::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Contacts $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='contacts-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
