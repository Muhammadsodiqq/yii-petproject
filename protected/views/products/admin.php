<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Products', 'url'=>array('index')),
	array('label'=>'Create Products', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#products-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});

");
?>

<h1>Manage Products</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'products-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'sum',
		array(
			"type" => "raw",
			"name" => "img",
			'value'=>array($this,'getImage1'),
			'htmlOptions'=>array('width'=>'30px','height'=>'30px'),
		),
		// 'img',
		'status',
		'category.title',
		// 'created_at',
		// 'updated_at',
		'is_deleted',
		'user.username',
		array(
			'class'=>'CButtonColumn',
		),
	),

)); ?>

<script>
	let images = document.querySelectorAll('img');
	console.log(images);
	images.forEach(function(img){
		// if(!img.src.split("/").includes("assets")){
		// 	img.style.width = '100px';	
		// 	img.style.height = '100px';	
		// }
	})
</script>