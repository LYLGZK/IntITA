<?php
/**
 * Created by PhpStorm.
 * User: Ivanna
 * Date: 14.04.2015
 * Time: 18:44
 */

?>
<div class="element">
    <div class="lessonInstr">
        <img class="lessonBut" src="<?php echo StaticFilesHelper::createPath('image', 'lecture', 'lessButton.png'); ?>">
        <div class="lessonButName" unselectable="on"><?php echo Yii::t('lecture', '0085'); ?></div>
        <div class="lessonLine"></div>
        <div class="lessonBG">
            <div class="instrTaskImg">
                <img src="<?php echo StaticFilesHelper::createPath('image', 'lecture', 'instr.png'); ?>">
            </div>
            <div class="content">
                <div class="instructionText" id="<?php echo "t" . $data['block_order']; ?>">
                    <div ng-non-bindable>
                        <?php echo $data['html_block']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
