<?php
/* @var $this TestsController */
/* @var $model Tests */

$this->breadcrumbs=array(
	'Tests'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Tests', 'url'=>array('index')),
	array('label'=>'Create Tests', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tests-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tests</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tests-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'test_id',
		'name',
		'type',
		'duration',
		array('name'=>'status','value'=>'$data->getStatusName($data->status)'),
		'questions',
		array('name'=>'created_by','value'=>'$data->fullName()'),
		
		'created_on',
		'modified_on',
		array('name'=>'created_by','value'=>'$data->fullName()'),
		array('name'=>'modified_by','value'=>'$data->fullName()'),
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
