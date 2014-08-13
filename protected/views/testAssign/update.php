<?php
/* @var $this TestAssignController */
/* @var $model TestAssign */

$this->breadcrumbs=array(
	'Test Assigns'=>array('index'),
	$model->test_assign_id=>array('view','id'=>$model->test_assign_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TestAssign', 'url'=>array('index')),
	array('label'=>'Create TestAssign', 'url'=>array('create')),
	array('label'=>'View TestAssign', 'url'=>array('view', 'id'=>$model->test_assign_id)),
	array('label'=>'Manage TestAssign', 'url'=>array('admin')),
);
?>

<h1>Update TestAssign <?php echo $model->test_assign_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>