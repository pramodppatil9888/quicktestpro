<?php
/* @var $this TestAssignController */
/* @var $model TestAssign */

$this->breadcrumbs=array(
	'Test Assigns'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TestAssign', 'url'=>array('index')),
	array('label'=>'Create TestAssign', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#test-assign-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Test Assigns</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'test-assign-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'test_assign_id',
		array('name'=>'test_id','value'=>'$data->test->name'),
		array('name'=>'user_id','value'=>'$data->fullName()'),
		array('name'=>'role_id','value'=>'$data->role->name'),
		array('name'=>'status','value'=>'$data->getStatusName($data->status)'),
		'created_on',
		
		'modified_on',
		array('name'=>'created_by','value'=>'$data->fullName()'),
		array('name'=>'modified_by','value'=>'$data->fullName()'),
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
