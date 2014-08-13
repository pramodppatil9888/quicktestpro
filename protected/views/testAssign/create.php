<?php
/* @var $this TestAssignController */
/* @var $model TestAssign */

$this->breadcrumbs=array(
	'Test Assigns'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TestAssign', 'url'=>array('index')),
	array('label'=>'Manage TestAssign', 'url'=>array('admin')),
);
?>

<h1>Create TestAssign</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>