<?php
/* @var $this ContactsController */
/* @var $data Contacts */
?>
<a href="contacts/<?php echo CHtml::encode($data->id); ?>">
	<div class="view">

		<!-- <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
		<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		<br /> -->

		<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
		<?php echo CHtml::encode($data->name); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('number')); ?>:</b>
		<?php echo CHtml::encode($data->number); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('fk_groups')); ?>:</b>
		<?php echo CHtml::encode($data->fk_groups); ?>
		<br />

	</div>
</a>