<?php
/* @var $this ResultsController */
/* @var $model Results */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'results-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'test_id'); ?>
		<?php echo $form->textField($model,'test_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'test_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_score'); ?>
		<?php echo $form->textField($model,'total_score'); ?>
		<?php echo $form->error($model,'total_score'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_attempt'); ?>
		<?php echo $form->textField($model,'total_attempt'); ?>
		<?php echo $form->error($model,'total_attempt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_correct'); ?>
		<?php echo $form->textField($model,'total_correct'); ?>
		<?php echo $form->error($model,'total_correct'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'percentage'); ?>
		<?php echo $form->textField($model,'percentage'); ?>
		<?php echo $form->error($model,'percentage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'taken_duration'); ?>
		<?php echo $form->textField($model,'taken_duration'); ?>
		<?php echo $form->error($model,'taken_duration'); ?>
	</div>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->