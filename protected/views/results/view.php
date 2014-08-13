<?php
/* @var $this ResultsController */
/* @var $model Results */

$this->breadcrumbs=array(
	'Results'=>array('index'),
	$model->result_id,
);

$this->menu=array(
	array('label'=>'List Results', 'url'=>array('index')),
	array('label'=>'Create Results', 'url'=>array('create')),
	array('label'=>'Update Results', 'url'=>array('update', 'id'=>$model->result_id)),
	array('label'=>'Delete Results', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->result_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Results', 'url'=>array('admin')),
);
?>

<h1>View Results #<?php echo $model->result_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'result_id',
		'test_id',
		'total_score',
		'user_id',
		'total_attempt',
		'total_correct',
		'percentage',
		'taken_duration',
		'created_on',
		'modified_on',
		'created_by',
		'modified_by',
	),
)); ?>
