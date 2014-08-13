<?php
/* @var $this SectionsController */
/* @var $model Sections */

$this->breadcrumbs=array(
	'Sections'=>array('index'),
	$model->name=>array('view','id'=>$model->section_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sections', 'url'=>array('index')),
	array('label'=>'Create Sections', 'url'=>array('create')),
	array('label'=>'View Sections', 'url'=>array('view', 'id'=>$model->section_id)),
	array('label'=>'Manage Sections', 'url'=>array('admin')),
);
?>

<h1>Update Sections <?php echo $model->section_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>