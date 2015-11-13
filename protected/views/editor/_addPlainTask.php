<?php
/**
 * @var $form CActiveForm
 */
?>

<div id="addPlainTask">
    <br>
    <form  name="plainTask" method="post" action="<?php echo Yii::app()->createUrl('plainTask/addTask');?>">
        <fieldset>
            <label><?php echo Yii::t('lecture','0774'); ?></label>
            <br>
           <textarea name="block_element" class="plainTaskCondition" placeholder="<?php echo Yii::t('lecture','0773'); ?>"></textarea>

            <input name="pageId" id="pageId" type="hidden" value="<?php echo $pageId;?>"/>
            <input name="lectureId" id="lectureId" type="hidden" value="<?php echo $lecture;?>"/>
            <input name="testType" id="testType" type="hidden" value="plain"/>
            <input name="author" id="author" type="hidden" value="<?php echo TeacherHelper::getTeacherId(Yii::app()->user->getId());?>"/>
            <input type="submit" value="Додати завдання" id='addtests'>
        </fieldset>

    </form>

    <button onclick='cancelTest()'><?php echo Yii::t('lecture', '0707'); ?></button>

</div>
