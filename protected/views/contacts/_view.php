<?php
/* @var $this ContactsController */
/* @var $data Contacts */
?>
<a href="<?php echo CHtml::encode($data->id); ?>">
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

		<?php 
			$id=CHtml::encode($data->id);
			$relation=Contacts::getGroups($id);
			$print='';
			foreach ($relation as $value) {
				$print.=$value['name'].' ';
			}
			echo $print;
		?>

	</div>
</a>