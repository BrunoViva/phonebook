<?php
/* @var $this ContactsHasGroupsController */
/* @var $model ContactsHasGroups */

$this->breadcrumbs=array(
	'Contacts Has Groups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ContactsHasGroups', 'url'=>array('index')),
	array('label'=>'Manage ContactsHasGroups', 'url'=>array('admin')),
);
?>

<h1>Create ContactsHasGroups</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>