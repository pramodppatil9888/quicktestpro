<?php
/* @var $this QuestionsController */
/* @var $model Questions */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'questions-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'question'); ?>
		<?php echo $form->textField($model,'question',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'question'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'multiple_answer'); ?>
		<?php echo $form->textField($model,'multiple_answer'); ?>
		<?php echo $form->error($model,'multiple_answer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subject_id'); ?>
		<?php 
			 echo $form->dropDownList($model, 'subject_id',CHtml::listData(Subjects::model()->findAll(),'subject_id','name'), array('prompt'=>'Select Subject'));			
		echo $form->error($model,'subject_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'marks'); ?>
		<?php echo $form->textField($model,'marks'); ?>
		<?php echo $form->error($model,'marks'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'negative'); ?>
		<?php echo $form->textField($model,'negative'); ?>
		<?php echo $form->error($model,'negative'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'section_id'); ?>
		<?php echo $form->textField($model,'section_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'section_id'); ?>
	</div>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->