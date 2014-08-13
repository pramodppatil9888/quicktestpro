<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->user_id,
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'Update Users', 'url'=>array('update', 'id'=>$model->user_id)),
	array('label'=>'Delete Users', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->user_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>

<h1>View Users #<?php echo $model->user_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'user_id',
		'first_name',
		'last_name',
		'email',
		'password',
		'mobile',
		array('name'=>'date_of_birth','value'=>date("d-m-Y",strtotime($model->date_of_birth))),
		array('name'=>'role_id','value'=>$model->role->name),
		array('name'=>'created_by','value'=>$model->fullName()),
		array('name'=>'modified_by','value'=>$model->fullName()),
		'created_on',
		'modified_on',
		/*'last_login',
		'ip_address',*/
	),
)); ?>
