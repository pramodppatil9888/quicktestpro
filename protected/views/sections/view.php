<?php
/* @var $this SectionsController */
/* @var $model Sections */

$this->breadcrumbs=array(
	'Sections'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Sections', 'url'=>array('index')),
	array('label'=>'Create Sections', 'url'=>array('create')),
	array('label'=>'Update Sections', 'url'=>array('update', 'id'=>$model->section_id)),
	array('label'=>'Delete Sections', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->section_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sections', 'url'=>array('admin')),
);
?>

<h1>View Sections #<?php echo $model->section_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'section_id',
		'name',
		'created_on',
		'modified_on',
		array('name'=>'created_by' ,'value'=>$model->fullname()),
		array('name'=>'created_by' ,'value'=>$model->fullname()),
	),
)); ?>
