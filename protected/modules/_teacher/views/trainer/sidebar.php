<?php
/**
 * Created by PhpStorm.
 * User: Quicks
 * Date: 15.12.2015
 * Time: 17:41
 *
 * @var $teacher Teacher
 * @var $role Roles
 * @var $this CabinetController
 * @var $user StudentReg   */
 ?>
<li>
    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> <?php echo $role->title_en ?><span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="#" onclick="loadPage('<?php echo Yii::app()->createUrl('/_teacher/cabinet/loadPage',
                array('page' => $role->title_en, 'user' => $user->id));?>','<?php echo $role->title_en ?>')">Дошка</a>
        </li>
        <li>
            <a href="#" ng-click="manageConsult('<?php echo Yii::app()->createUrl('/_teacher/teacher/manageConsult') ?>')">
                Управління консультантами
            </a>
        </li>
    </ul>
    <!-- /.nav-second-level -->
</li>