<?php
/* @var $this QuestionsController */
/* @var $data Questions */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('question_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->question_id), array('view', 'id'=>$data->question_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('question')); ?>:</b>
	<?php echo CHtml::encode($data->question); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('multiple_answer')); ?>:</b>
	<?php echo CHtml::encode($data->getMultipleOption($data->multiple_answer)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subject_id')); ?>:</b>
	<?php echo CHtml::encode($data->subject->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('marks')); ?>:</b>
	<?php echo CHtml::encode($data->marks); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('negative')); ?>:</b>
	<?php echo CHtml::encode($data->getOption($data->negative)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('section_id')); ?>:</b>
	<?php echo CHtml::encode($data->section->name); ?>
	<br />


</div>