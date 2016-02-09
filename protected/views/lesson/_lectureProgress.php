<?php
/**
 * Created by PhpStorm.
 * User: Wizlight
 * Date: 06.09.2015
 * Time: 16:09
 */
?>
<?php $lastAccessPage=LecturePage::lastAccessPage($passedPages) ?>
<div class="lessonPart">
    <div class="labelBlock" id="labelBlock">
        <p><?php echo Yii::t('lecture', '0615')." ".$page->page_order . '. ' . $page->page_title; ?></p>
    </div>
    <div id="tooltip"></div>
</div>
<img id="arrowCursor" src="<?php echo StaticFilesHelper::createPath('image', 'common', 'arrow.png') ?>">
<img id="pointer" src="<?php echo StaticFilesHelper::createPath('image', 'common', 'pointer.png') ?>">
<?php if ($edit == 0) { ?>
    <div class="lectureProgress">
        <?php
        for ($i = 0, $count = count($passedPages); $i < $count; $i++) {
            if ($passedPages[$i]['isDone'] || $editMode || StudentReg::isAdmin()
            ) {
                ?>
                <a class="pageDone pageTitle <?php if($i==$lastAccessPage && !$editMode) echo 'lastAccessPage' ?>"
                   id="<?php if($i==$thisPage-1) echo 'pagePressed' ?>"
                   href="<?php $args = $_GET;
                   $args['page'] = $passedPages[$i]['order'];
                   $args['idCourse'] = ($idCourse)?$idCourse:'0';
                   echo $this->createUrl('', $args); ?>"
                   title="<?php echo Yii::t('lecture', '0615')." ".$passedPages[$i]['order'] . '. ' . $passedPages[$i]['title']; ?>">
                    <div class="spotDone <?php if($i==$lastAccessPage && !$editMode) echo 'lastAccessPage' ?>"></div></a>
            <?php } else {
                ?>
                <a class="pageNoAccess pageTitle"
                   title="<?php echo Yii::t('lecture', '0615')." ".$passedPages[$i]['order'] . '. ' . $passedPages[$i]['title']; ?>">
                    <div class="spotDisabled"></div></a>
            <?php }
        }
        if (!$editMode)
        {?>
        <img style="margin-left: 10px"
             src="<?php if ($finishedLecture) echo StaticFilesHelper::createPath('image', 'common', 'medal1.png');
             else echo StaticFilesHelper::createPath('image', 'common', 'medal0.png'); ?>">
        <?php
        }?>
    </div>
<?php } elseif ($edit == 1) {
    for ($i = 0, $count = LecturePage::getNumberLecturePages($page->id_lecture); $i < $count; $i++) { ?>
        <a class="pageDone pageTitle"
           id="<?php if($i==$thisPage-1) echo 'pagePressed' ?>"
           href="<?php echo Yii::app()->createURL('lesson/index', array('id' => $_GET['id'], 'idCourse' => $idCourse));?>?editPage=<?php echo $i+1; ?>"
           title="<?php echo Yii::t('lecture', '0615')." ".$passedPages[$i]['order'] . '. ' . $passedPages[$i]['title']; ?>">
            <div class="spotDone"></div></a>
        <?php
    }
} ?>