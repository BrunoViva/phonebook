<?php
/* @var $this ContactsHasGroupsController */
/* @var $data ContactsHasGroups */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_contacts')); ?>:</b>
	<?php echo CHtml::encode($data->fk_contacts); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_groups')); ?>:</b>
	<?php echo CHtml::encode($data->fk_groups); ?>
	<br />


</div>