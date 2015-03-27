<?php
/* @var $this GroupsController */
/* @var $data Groups */
?>
<a href="<?php echo CHtml::encode($data->id); ?>">
	<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
		<?php echo CHtml::encode($data->name); ?>
		<br />


	</div>
</a>