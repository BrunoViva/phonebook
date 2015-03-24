<?php
/* @var $this ContactsHasGroupsController */
/* @var $model ContactsHasGroups */

$this->breadcrumbs=array(
	'Contacts Has Groups'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ContactsHasGroups', 'url'=>array('index')),
	array('label'=>'Create ContactsHasGroups', 'url'=>array('create')),
	array('label'=>'View ContactsHasGroups', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ContactsHasGroups', 'url'=>array('admin')),
);
?>

<h1>Update ContactsHasGroups <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>