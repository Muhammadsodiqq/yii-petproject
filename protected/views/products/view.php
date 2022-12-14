<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->title,
);

$this->menu = Yii::app()->user->checkAccess('Products.*') ? array(
	array('label'=>'List Products', 'url'=>array('index')),
	array('label'=>'Create Products', 'url'=>array('create')),
	array('label'=>'Update Products', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Products', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Products', 'url'=>array('admin')),
) : array(
	Yii::app()->user->checkAccess('Products.Index') ? array('label'=>'List Products', 'url'=>array('index')) : [],
	Yii::app()->user->checkAccess('Products.Create') ? array('label'=>'Create Products', 'url'=>array('create')) : [],
	Yii::app()->user->checkAccess('Products.Update') ? array('label'=>'Update Products', 'url'=>array('update', 'id'=>$model->id)) : [],
	Yii::app()->user->checkAccess('Products.Delete') ? array('label'=>'Delete Products', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')) : [],
	Yii::app()->user->checkAccess('Products.Admin') ? array('label'=>'Manage Products', 'url'=>array('admin')) : [],
);
?>

<h1>View Products #<?php echo $model->id; ?></h1>

<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?= Yii::app()->request->baseUrl . $model->img ?>" alt="Card image cap">
  <hr>
  <div class="card-body">
    <h5 class="card-title"><?= $model->title?></h5>

    <p class="card-text">sum: <strong><?= $model->sum ?>$</strong></p>
    <p class="card-text">Categoriya: <strong><?= $model->category->title ?></strong></p>
	<p class="card-text"><?= $model->body ?></p>
  </div>
</div>

