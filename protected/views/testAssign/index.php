<?php
/* @var $this TestAssignController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Test Assigns',
);

$this->menu=array(
	array('label'=>'Create TestAssign', 'url'=>array('create')),
	array('label'=>'Manage TestAssign', 'url'=>array('admin')),
);
?>

<h1>Test Assigns</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
