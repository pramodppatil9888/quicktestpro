<?php
/* @var $this RolesController */
/* @var $model Roles */

$this->breadcrumbs=array(
	'Roles'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Roles', 'url'=>array('index')),
	array('label'=>'Create Roles', 'url'=>array('create')),
	array('label'=>'Update Roles', 'url'=>array('update', 'id'=>$model->role_id)),
	array('label'=>'Delete Roles', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->role_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Roles', 'url'=>array('admin')),
);
?>

<h1>View Roles #<?php echo $model->role_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'role_id',
		'name',
		'created_on',
		'modified_on',
		array('name'=>'created_by','value'=>$model->fullName()),
		array('name'=>'modified_by','value'=>$model->fullName()),
	),
)); ?>
