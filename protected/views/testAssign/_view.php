<?php
/* @var $this TestAssignController */
/* @var $data TestAssign */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Test Assigned id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->test_assign_id), array('view', 'id'=>$data->test_assign_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('test_id')); ?>:</b>
	<?php echo CHtml::encode($data->test->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user->fullname()); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('role_id')); ?>:</b>
	<?php echo CHtml::encode($data->role->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->getStatusName($data->status)); ?>
	<br />

</div>