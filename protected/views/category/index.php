<?php
/* @var $this CategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Categories',
);
// echo Yii::app()->user->checkAccess('Category.*');
// die();

$this->menu = Yii::app()->user->checkAccess('Category.*')  ? array(
	array('label'=>'Create Category', 'url'=>array('create')) ,
	array('label'=>'Manage Category', 'url'=>array('admin')),
) : array(
	Yii::app()->user->checkAccess('Category.Create') ?array('label'=>'Create Category', 'url'=>array('create')) : [],
	Yii::app()->user->checkAccess('Category.Admin') ? array('label'=>'Manage Category', 'url'=>array('admin')) : [],
) ;
?>

<h1>Categories</h1>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
