<div id="editPlainTask">
    <br>
    <form  name="plainTaskEdit" method="post" action="<?php echo Yii::app()->createUrl('plainTask/editTask');?>">
        <fieldset>
            <label><?php echo Yii::t('lecture','0774'); ?></label>
            <br>
            <textarea ng-cloak ckeditor="editorOptionsTask" name="block_element" class="plainTaskCondition"
                      placeholder="<?php echo Yii::t('lecture','0773');  ?>"
                      required ng-init="editPlainTask='<?php echo htmlentities($data['html_block']); ?>'"
                      ng-model="editPlainTask"></textarea>
            <input name="pageId" id="pageId" type="hidden" value="<?php echo $pageId;?>"/>
            <input name="lectureId" id="lectureId" type="hidden" value="<?php echo $data->id_lecture;?>"/>
            <input name="testType" id="testType" type="hidden" value="plain"/>
            <input name="id_block" id="testType" type="hidden" value="<?php echo $data->id_block ?>"/>
            <input name="author" id="author" type="hidden" value="<?php echo Teacher::getTeacherId(Yii::app()->user->getId());?>"/>
            <br>
            <input type="submit" value=<?php echo Yii::t('lecture','0720'); ?> id='addtests'
                   ng-disabled=plainTaskEdit.block_element.$error.required>
        </fieldset>
    </form>
    <button ng-click='unablePlainTask(<?php echo $pageId; ?>)'><?php echo Yii::t('lecture','0718'); ?></button>
</div>
