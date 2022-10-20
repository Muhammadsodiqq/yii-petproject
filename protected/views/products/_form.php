<?php
/* @var $this ProductsController */
/* @var $model Products */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'products-form',
		'htmlOptions' => array(
			'enctype' => 'multipart/form-data',
		),
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation' => false,
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="input-group mb-3">
		<?php echo $form->labelEx($model, 'title'); ?>
		<?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 255, "class" => "form-control")); ?>
		<?php echo $form->error($model, 'title'); ?>
	</div>

	<div class="input-group mb-3">
		<?php echo $form->labelEx($model, 'body'); ?>
		<?php echo $form->textArea($model, 'body', array('size' => 60, "class" => "form-control")); ?>
		<?php echo $form->error($model, 'body'); ?>
	</div>

	<div class="input-group mb-3">
		<?php echo $form->labelEx($model, 'sum'); ?>
		<?php echo $form->numberField($model, 'sum', array('size' => 60, "class" => "form-control")); ?>
		<?php echo $form->error($model, 'sum'); ?>
	</div>

	<div class="input-group mb-3">
		<?php echo $form->labelEx($model, 'img'); ?>
		<?php echo $form->fileField($model, 'img', array('size' => 60, "class" => "form-control")); ?>
		<?php echo $form->error($model, 'img'); ?>

		<?php if ($model->isNewRecord != '1') { ?>
			<div class="input-group mb-3">
				<?php echo CHtml::image(Yii::app()->request->baseUrl . $model->img, "img", array("width" => 200)); ?>
			</div>
		<?php } ?>

	</div>
	<?php if ($model->isNewRecord != '1') { ?>

		<div class="input-group mb-3">
			<?php echo $form->labelEx($model, 'status'); ?>
			<?php echo $form->numberField($model, 'status', array("class" => "form-control")); ?>
			<?php echo $form->error($model, 'status'); ?>
		</div>
	<?php } ?>

	<div class="input-group mb-3">
		<?php echo $form->labelEx($model, 'category_id'); ?>
		<?php echo $form->dropDownList($model, 'category_id', CHtml::listData(Category::model()->findAll([
			"condition" => "is_deleted = 0",
		]),  "id", "title")); ?>
		<?php echo $form->error($model, 'category_id'); ?>
	</div>

	<?php if ($model->isNewRecord != '1') { ?>

		<div class="input-group mb-3">
			<?php echo $form->labelEx($model, 'is_deleted'); ?>
			<?php echo $form->numberField($model, 'is_deleted', array("class" => "form-control")); ?>
			<?php echo $form->error($model, 'is_deleted'); ?>
		</div>
	<?php } ?>



	<div class="input-group mb-3 buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
	document.getElementById('Products_category_id').classList.add("form-control");

	document.querySelector('input[type="submit"]').classList.add('btn')
	document.querySelector('input[type="submit"]').classList.add('btn-primary')
</script>