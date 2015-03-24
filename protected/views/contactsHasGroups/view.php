<?php
/* @var $this ContactsHasGroupsController */
/* @var $model ContactsHasGroups */

$this->breadcrumbs=array(
	'Contacts Has Groups'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ContactsHasGroups', 'url'=>array('index')),
	array('label'=>'Create ContactsHasGroups', 'url'=>array('create')),
	array('label'=>'Update ContactsHasGroups', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ContactsHasGroups', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ContactsHasGroups', 'url'=>array('admin')),
);
?>

<h1>View ContactsHasGroups #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'fk_contacts',
		'fk_groups',
	),
)); ?>
