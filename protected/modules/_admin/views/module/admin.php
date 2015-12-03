<?php
/* @var $this ModuleController */
/* @var $model Module */

$this->breadcrumbs=array(
	'Modules'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Module', 'url'=>array('index')),
	array('label'=>'Create Module', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#module-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="page-header">
<h1>Manage Modules</h1>
</div>
<div class="page-header">
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
</div>
<button type="button" class="btn btn-link">
    <?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
</button>
    <div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'module-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'module_ID',
		'title_ru',
		'module_number',
		'title_en',
		'title_ua',
		'alias',
		/*
		'language',
		'module_duration_hours',
		'module_duration_days',
		'lesson_count',
		'module_price',
		'for_whom',
		'what_you_learn',
		'what_you_get',
		'module_img',
		'about_module',
		'owners',
		'level',
		'hours_in_day',
		'days_in_week',
		'rating',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
