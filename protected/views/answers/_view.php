<?php
/* @var $this AnswersController */
/* @var $data Answers */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('answer_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->answer_id), array('view', 'id'=>$data->answer_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('answer')); ?>:</b>
	<?php echo CHtml::encode($data->answer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correct_answer')); ?>:</b>
	<?php echo CHtml::encode($data->getStatusName($data->correct_answer)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('question_id')); ?>:</b>
	<?php echo CHtml::encode($data->question->question); ?>
	<br />

	

</div>