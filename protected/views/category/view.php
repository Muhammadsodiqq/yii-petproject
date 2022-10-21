<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->title,
);

$this->menu = array(
	Yii::app()->user->checkAccess('Category.Index') ? array('label'=>'List Category', 'url'=>array('index')) : [],
	Yii::app()->user->checkAccess('Category.Create') ? array('label'=>'Create Category', 'url'=>array('create')) : [],
	Yii::app()->user->checkAccess('Category.Update') ? array('label'=>'Update Category', 'url'=>array('update', 'id'=>$model->id)) : [],
	Yii::app()->user->checkAccess('Category.Delete') ? array('label'=>'Delete Category', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')) : [],
	Yii::app()->user->checkAccess('Category.Admin') ? array('label'=>'Manage Category', 'url'=>array('admin')) : [],
);
?>

<h1>Categoriya: <?= $model->title?></h1>
	<?php
		foreach($model->products as $product){
			$this->renderPartial("_produduct",array('data'=>$product));
		}
	?>