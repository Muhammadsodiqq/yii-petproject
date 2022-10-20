<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->title,
);

$this->menu = Yii::app()->user->checkAccess('1') ? array(
	array('label'=>'List Category', 'url'=>array('index')),
	array('label'=>'Create Category', 'url'=>array('create')),
	array('label'=>'Update Category', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Category', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Category', 'url'=>array('admin')),
) : array(
	array('label'=>'List Category', 'url'=>array('index')),
);
?>

<h1>Categoriya: <?= $model->title?></h1>
	<?php
		foreach($model->products as $product){
			$this->renderPartial("_produduct",array('data'=>$product));
		}
	?>