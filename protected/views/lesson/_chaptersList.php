<?php
/**
 * Created by PhpStorm.
 * User: Wizlight
 * Date: 06.09.2015
 * Time: 18:12
 */
?>
<span class="listTheme"><?php echo Yii::t('lecture', '0321');?> </span><span class="spoilerLinks"><span class="spoilerClick">(показати)</span><span class="spoilerTriangle"> &#9660;</span></span>
<div class="spoilerBody">
    <?php
    $summary =  Lecture::getLessonCont($idLecture);
    for($i=0; $i<count($summary);$i++){
        ?>
        <p>
            <a href="<?php $args = $_GET;
            $args['page'] = $passedPages[$i]['order'];
            echo $this->createUrl('', $args);?>" class="<?php if($passedPages[$i]['isDone']) echo 'pageAccess' ?>"
               title="Частина <?php echo $passedPages[$i]['order'];?>">
                <?php echo 'Частина '.$passedPages[$i]['order'].'. '.strip_tags($summary[$i]);?>
            </a>
        </p>
        <?php
    }
    ?>
</div>
<!-- Spoiler -->
<script src="<?php echo Config::getBaseUrl(); ?>/scripts/chaptersSpoiler.js"></script>
<!-- Spoiler -->