<?php
/* @var $this TestAssignController */
/* @var $model TestAssign */

$this->breadcrumbs=array(
	'Test Assigns'=>array('index'),
	$model->test_assign_id,
);

$this->menu=array(
	array('label'=>'List TestAssign', 'url'=>array('index')),
	array('label'=>'Create TestAssign', 'url'=>array('create')),
	array('label'=>'Update TestAssign', 'url'=>array('update', 'id'=>$model->test_assign_id)),
	array('label'=>'Delete TestAssign', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->test_assign_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TestAssign', 'url'=>array('admin')),
);
?>

<h1>View TestAssign #<?php echo $model->test_assign_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'test_assign_id',
		array('name'=>'test_id','value'=>$model->test->name),
		array('name'=>'user_id','value'=>$model->fullName()),
		array('name'=>'role_id','value'=>$model->role->name),
		array('name'=>'status','value'=>$model->getStatusName($model->status)),
		'created_on',
		'modified_on',
		array('name'=>'created_by','value'=>$model->fullName()),
		array('name'=>'modified_by','value'=>$model->fullName()),
	
	),
)); ?>
