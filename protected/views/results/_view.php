<?php
/* @var $this ResultsController */
/* @var $data Results */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('result_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->result_id), array('view', 'id'=>$data->result_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('test_id')); ?>:</b>
	<?php echo CHtml::encode($data->test_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_score')); ?>:</b>
	<?php echo CHtml::encode($data->total_score); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_attempt')); ?>:</b>
	<?php echo CHtml::encode($data->total_attempt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_correct')); ?>:</b>
	<?php echo CHtml::encode($data->total_correct); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('percentage')); ?>:</b>
	<?php echo CHtml::encode($data->percentage); ?>
	<br />

	
</div>