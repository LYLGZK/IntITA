<div class="row">
    <div class="col-lg-12">
        Контент менеджер
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-green">
            <div class="panel-heading">
                Автори модулів
            </div>
            <div class="panel-body">
                <ul>
                    <li><a href="#"
                           onclick="load('<?php echo Yii::app()->createUrl('/_teacher/_content_manager/contentManager/authors'); ?>',
                               'Права доступа')">Автори модулів</a>
                    </li>
                    <li><a href="#"
                           onclick="load('<?php echo Yii::app()->createUrl('/_teacher/_content_manager/contentManager/consultants'); ?>',
                               'Права доступа')">Консультанти для модулів</a>
                    </li>
                 </ul>
            </div>
            <div class="panel-footer">
                <em>Права редагування контенту</em>
            </div>
        </div>
    </div>
</div>