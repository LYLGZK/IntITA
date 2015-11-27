<?php
$lectures = Lecture::getAllVerifiedLectures();
foreach($lectures as $record) {
    echo "<a href='".Yii::app()->createUrl('/_admin/verifyContent/cancel', array('id' => $record->id)).
        "' class='confirm'>Скасувати   </a>     <span class='lectureTitle'><a href='" .
        Yii::app()->createUrl('lesson/index', array('id' => $record->id, 'idCourse' => 0)) . "'</a>" .
        LectureHelper::getLectureTitle($record->id) . " <span class='moduleTitle'>(модуль - " .
        ModuleHelper::getModuleName($record->idModule).")</span></span></a><br>";
}
?>