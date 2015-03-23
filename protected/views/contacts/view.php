<?php
/* @var $this ContactsController */
/* @var $model Contacts */

$this->breadcrumbs=array(
	'Contacts'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Contacts', 'url'=>array('index')),
	array('label'=>'Create Contacts', 'url'=>array('create')),
	array('label'=>'Update Contacts', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Contacts', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Contacts', 'url'=>array('admin')),
);
?>

<h1>View Contacts #<?php echo $model->id; ?></h1>

<?php 
	$find = $model->find(array(
		'condition'=>'id=:id',
		'params'=>array(':id'=>$_GET['id']),
		));

	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			'id',
			'name',
			'number',
			array(
				'label'=>'Group',
				'value'=>$find->fk_groups,
			),
	),
)); ?>
