<?php
/* @var $this QuestionsController */
/* @var $model Questions */

$this->breadcrumbs=array(
	'Questions'=>array('index'),
	$model->question_id,
);

$this->menu=array(
	array('label'=>'List Questions', 'url'=>array('index')),
	array('label'=>'Create Questions', 'url'=>array('create')),
	array('label'=>'Update Questions', 'url'=>array('update', 'id'=>$model->question_id)),
	array('label'=>'Delete Questions', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->question_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Questions', 'url'=>array('admin')),
);
?>

<h1>View Questions #<?php echo $model->question_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'question_id',
		'question',
		array('name'=>'multiple_answer','value'=>$model->getMultipleOption($model->multiple_answer)),
		array('name'=>'subject_id','value'=>$model->subject->name),
		'marks',
		'negative',
		array('name'=>'section_id','value'=>$model->subject->name),
		'created_on',
		'modified_on',
		array('name'=>'created_by', 'value'=>$model->fullName()),
		'modified_by',
	),
)); ?>

<h2>View Options </h2>
<?php// 	print_r($answer_model->answer->correct_answer);exit;?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'answers-grid',
	'dataProvider'=>$options_model->search(),
	'filter'=>$options_model,
	'columns'=>array(
		'answer_id',
		'answer',
		'description',
		'correct_answer',
		array('name'=>'correct_answer','value'=>'$data->getStatusName($data->correct_answer)'),
			/*array('name'=>'correct_answer','value'=>$options_model->answer->correct_answer),*/
		array('name'=>'created_by','value'=>'$data->fullName()'),
		'created_on',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<h1>Create Answers</h1>



<?php $this->renderPartial('_form_answer', array('model'=>$answer_model)); ?>