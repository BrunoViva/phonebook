<?php
/* @var $this ContactsHasGroupsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Contacts Has Groups',
);

$this->menu=array(
	array('label'=>'Create ContactsHasGroups', 'url'=>array('create')),
	array('label'=>'Manage ContactsHasGroups', 'url'=>array('admin')),
);
?>

<h1>Contacts Has Groups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
