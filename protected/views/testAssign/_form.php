<?php
/* @var $this TestAssignController */
/* @var $model TestAssign */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'test-assign-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'test_id'); ?>
		<?php  $test = Tests::model()->findAll();				
			   $test = CHtml::listData($test, 'test_id', 'name');
			   echo $form->dropDownList($model, 'test_id',$test, array('prompt'=>'Select test')); ?>
		<?php echo $form->error($model,'test_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		
	<?php echo $form->hiddenField($model,'user_id',array()); ?>
				
		<?php //echo $form->textField($model,'trip_max_budget'); 
                  
                $this->widget('zii.widgets.jui.CJuiAutoComplete',array(
                'model'=>$model,
                'attribute'=>'user_id',
               	'name'=>'user_id',
                'source'=>$this->createUrl('testassign/AutoComplete'),
                // additional javascript options for the autocomplete plugin
                'htmlOptions'=>array(
                'style'=>'height:20px;',
                'size'=>20,
                'maxlength'=>20,
                ),
                ));
          ?>
			<?php echo $form->error($model,'user_id'); ?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'role_id'); ?>
		<?php  $role = Roles::model()->findAll();				
			   $role = CHtml::listData($role, 'role_id', 'name');
			   echo $form->dropDownList($model, 'role_id',$role, array('prompt'=>'Select role')); ?>
		<?php echo $form->error($model,'role_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->