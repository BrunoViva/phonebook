<?php
/* @var $this ContactsHasGroupsController */
/* @var $model ContactsHasGroups */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contacts-has-groups-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fk_contacts'); ?>
		<?php echo $form->textField($model,'fk_contacts',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'fk_contacts'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fk_groups'); ?>
		<?php echo $form->textField($model,'fk_groups',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'fk_groups'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->