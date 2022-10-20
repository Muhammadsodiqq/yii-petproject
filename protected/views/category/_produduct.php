<div class="col-sm-5 d-inline-block m-2">
		<div class="card ml-2" style="width: 18rem;">
			<img class="card-img-top" src="<?= Yii::app()->request->baseUrl . $data->img ?>" alt="Card image cap">
			<hr>
			<div class="card-body">
				<h5 class="card-title"><?php echo CHtml::link(CHtml::encode($data->title), array('products/view', 'id' => $data->id)); ?></h5>

				<p class="card-text">sum: <strong><?= $data->sum ?>$</strong></p>
				<p class="card-text">Categoriya: <strong><?= $data->category->title ?></strong></p>
				<p class="card-text"><?= $data->body ?></p>

			</div>
		</div>

</div>