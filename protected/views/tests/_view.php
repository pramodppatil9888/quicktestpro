<?php
/* @var $this TestsController */
/* @var $data Tests */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('test_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->test_id), array('view', 'id'=>$data->test_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('duration')); ?>:</b>
	<?php echo CHtml::encode($data->duration); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->getStatusName($data->status)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('questions')); ?>:</b>
	<?php echo CHtml::encode($data->questions); ?>
	<br />



</div>