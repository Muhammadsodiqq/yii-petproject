<?php
/* @var $this ProductsController */
/* @var $data Products */
?>

<!-- <div class="view"> -->



	<div class="col-sm-5 d-inline-block m-2">
		<div class="card ml-2" style="width: 18rem;">
			<img class="card-img-top" src="<?= Yii::app()->request->baseUrl . $data->img ?>" alt="Card image cap">
			<hr>
			<div class="card-body">
				<h5 class="card-title"><?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id' => $data->id)); ?></h5>

				<p class="card-text">sum: <strong><?= $data->sum ?>$</strong></p>
				<p class="card-text">Categoriya: <strong><?= $data->category->title ?></strong></p>
				<p class="card-text"><?= $data->body ?></p>

			</div>
		</div>

	</div>

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_deleted')); ?>:</b>
	<?php echo CHtml::encode($data->is_deleted); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	*/ ?>

<!-- </div> -->