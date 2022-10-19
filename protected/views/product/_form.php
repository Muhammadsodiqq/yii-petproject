<?php
/* @var $this ProductController */
/* @var $model Product */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'product-form',
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
));?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model, 'title'); ?>
		<?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 255)); ?>
		<?php echo $form->error($model, 'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'sum'); ?>
		<?php echo $form->numberField($model, 'sum'); ?>
		<?php echo $form->error($model, 'sum'); ?>
	</div>

	
		<?php if ($model->isNewRecord != '1') {?>
	<div class="row">
		 <?php echo CHtml::image(Yii::app()->request->baseUrl . $model->img, "img", array("width" => 200)); ?>
	</div>
	<?php }?>


	<div class="row">
		<?php echo $form->labelEx($model, 'status'); ?>
		<?php echo $form->numberField($model, 'status'); ?>
		<?php echo $form->error($model, 'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'category_id'); ?>
		<?php echo $form->dropDownList($model, 'category_id', CHtml::listData(Category::model()->findAll([
    "condition" => "is_deleted = 0",
]), "id", "title")); ?>
		<?php echo $form->error($model, 'category_id'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model, 'is_deleted'); ?>
		<?php echo $form->numberField($model, 'is_deleted'); ?>
		<?php echo $form->error($model, 'is_deleted'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<?php $this->endWidget();?>

</div><!-- form -->