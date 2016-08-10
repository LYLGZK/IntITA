<?php
/* @var $this ModuleController
 * @var $model Module
 * @var $courses array
 * @var $teachers array
 * @var $consultants array
 */
?>
    <div class="row">


        <ul class="list-inline">
            <li>
                <button type="button" class="btn btn-primary" ng-click="changeView('modulemanage')">
                    Список модулів
                </button>
            </li>
            <li>
                <button type="button" class="btn btn-primary" ng-click="changeView('module/edit/<?=$model->module_ID?>')">Редагувати модуль</button>
            </li>
            <li>
                <button type="button" class="btn btn-success" ng-click="changeView('module/addAuchtor/<?= $model->module_ID ?>')">
                    Призначити автора
                </button>
            </li>
            <li>
                <button type="button" class="btn btn-success" ng-click="changeView('module/addConsultant/<?= $model->module_ID ?>')">
                    Призначити консультанта
                </button>
            </li>
        </ul>
    </div>

<div class="panel panel-default">
    <div class="panel-body">
        <uib-tabset active="0" >
            <uib-tab  index="0" heading="Головне">
                <?php $this->renderPartial('_mainTab', array('model' => $model));?>
            </uib-tab>
            <uib-tab index="1" heading="Українською">
                <?php $this->renderPartial('_uaTab', array('model' => $model));?>
            </uib-tab>
            <uib-tab  index="2" heading="Російською">
                <?php $this->renderPartial('_ruTab', array('model' => $model));?>
            </uib-tab>
            <uib-tab  index="3" heading="Англійською">
                <?php $this->renderPartial('_enTab', array('model' => $model));?>
            </uib-tab>
            <uib-tab  index="4" heading="Лекції">
                <?php $this->renderPartial('_lecturesTab', array('model' => $model, 'scenario' => 'view'));?>
            </uib-tab>
            <uib-tab  index="5" heading="Автори">
                <?php $this->renderPartial('_authorsTab', array('model' => $model, 'scenario' => 'view',
                    'teachers' => $teachers));?>
            </uib-tab>
            <uib-tab  index="6" heading="Консультанти">
                <?php $this->renderPartial('_consultantsTab', array('model' => $model, 'scenario' => 'view',
                    'teachers' => $consultants)); ?>
            </uib-tab>
            <uib-tab  index="7" heading="У курсах">
                <?php $this->renderPartial('_inCoursesTab', array(
                    'model' => $model,
                    'scenario' => 'view',
                    'courses' => $courses
                ));?>
            </uib-tab>
        </uib-tabset>
    </div>
</div>

