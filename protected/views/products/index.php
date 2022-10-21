<?php
/* @var $this ProductsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Products',
);

$this->menu = Yii::app()->user->checkAccess('Products.*') ? array(
	array('label'=>'Create Products', 'url'=>array('create')),
	array('label'=>'Manage Products', 'url'=>array('admin')),)
	: array(
	Yii::app()->user->checkAccess('Products.Create') ?array('label'=>'Create Products', 'url'=>array('create')) : [],
	Yii::app()->user->checkAccess('Products.Admin') ? array('label'=>'Manage Products', 'url'=>array('admin')) : [],);
?>

<h1>Products</h1>
<!-- <div class="row"> -->

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
<!-- </div> -->