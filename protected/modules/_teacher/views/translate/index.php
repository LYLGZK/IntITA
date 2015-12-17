<?php
/* @var $this MessagesController */
/* @var $model Translate */
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#messages-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<link rel="stylesheet" type="text/css" href="<?php echo Config::getBaseUrl();?>/css/formattedForm.css"/>

<button class="btn btn-primary" onclick="load('<?php echo Yii::app()->createUrl('/_teacher/translate/create');?>')">
    Додати повідомлення
</button>
<br>
<br>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'messages-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'htmlOptions'=>array('class'=>'grid-view custom'),
    'pager' => array(
        'firstPageLabel'=>'&#171;&#171;',
        'lastPageLabel'=>'&#187;&#187;',
        'prevPageLabel'=>'&#171;',
        'nextPageLabel'=>'&#187;',
        'header'=>'',
        'cssFile'=> Config::getBaseUrl().'/css/pager.css'
    ),
    'summaryText'=>'',
    'columns'=>array(
        'id',
        'language',
        array(
            'header' => 'Категорія',
            'value' => 'Sourcemessages::getMessageCategory($data->id)',
        ),
        'translation',
        array(
            'header' => 'Коментар',
            'value' => 'MessageComment::getMessageCommentById($data->id)',
        ),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}{update}',
        ),
    ),
)); ?>