<?php
/* @var $this QuestionsController */
/* @var $model Questions */

$this->breadcrumbs=array(
	'Questions'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Questions', 'url'=>array('index')),
	array('label'=>'Create Questions', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#questions-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Questions</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'questions-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'question_id',
		'question',
array('name'=>'multiple_answer','value'=>'$data->getMultipleOption($data->multiple_answer)'),
		array('name'=>'subject_id','value'=>'$data->subject->name'),
		array('name'=>'section_id','value'=>'$data->section->name'),
		'marks',
		array('name'=>'negative','value'=>'$data->getOption($data->negative)'),
		array('name'=>'created_by','value'=>'$data->fullName()'),
		array('name'=>'modified_by','value'=>'$data->fullName()'),
		/*
		'section_id',
		'created_on',
		'modified_on',
		'created_by',
		'modified_by',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
