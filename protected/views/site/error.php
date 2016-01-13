<?php
/* @var $this SiteController */
/* @var $message string */
/* @var $code integer */
$this->breadcrumbs=array(
    Yii::t('error','0590'),
);
?>
<?php //var_dump(Yii::app()->errorHandler->error);die; ?>
<div class='errorblock'>
    <h1><?php echo Yii::t('error','0590')." ".$errorCode; ?></h1>
    <div class="error">
    <?php echo CHtml::encode($message)?>
    <?php //echo 'File : ' . CHtml::encode($trace) ?>
    <?php //echo 'File : ' . CHtml::encode($file) ?>
    <?php //echo 'Line : ' . CHtml::encode($line) ?>
    </div>
</div>