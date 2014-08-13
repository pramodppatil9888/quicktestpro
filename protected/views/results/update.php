<?php
/* @var $this ResultsController */
/* @var $model Results */

$this->breadcrumbs=array(
	'Results'=>array('index'),
	$model->result_id=>array('view','id'=>$model->result_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Results', 'url'=>array('index')),
	array('label'=>'Create Results', 'url'=>array('create')),
	array('label'=>'View Results', 'url'=>array('view', 'id'=>$model->result_id)),
	array('label'=>'Manage Results', 'url'=>array('admin')),
);
?>

<h1>Update Results <?php echo $model->result_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>