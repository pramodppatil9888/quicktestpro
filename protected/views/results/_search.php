<?php
/* @var $this ResultsController */
/* @var $model Results */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'result_id'); ?>
		<?php echo $form->textField($model,'result_id',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'test_id'); ?>
		<?php echo $form->textField($model,'test_id',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_score'); ?>
		<?php echo $form->textField($model,'total_score'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_attempt'); ?>
		<?php echo $form->textField($model,'total_attempt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_correct'); ?>
		<?php echo $form->textField($model,'total_correct'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'percentage'); ?>
		<?php echo $form->textField($model,'percentage'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'taken_duration'); ?>
		<?php echo $form->textField($model,'taken_duration'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->