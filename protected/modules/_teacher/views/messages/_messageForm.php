<?php
/* @var $user integer */
?>
<div id="messageForm">
    <form role="form" method="post" action="<?php echo Yii::app()->createUrl('messages/sendUserMessage'); ?>">

        <input class="form-control" name="id" id="hidden" value="<?= $user; ?>">

        <div class="form-group">
            <label>Тема</label>
            <input class="form-control" name="subject" placeholder="Тема листа" required>
        </div>

        <div class="form-group">
            <label>Лист</label>
            <textarea class="form-control" rows="6" name="text" placeholder="Лист" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            Написати
        </button>

        <button type="reset" class="btn btn-default"
                onclick="load('<?= Yii::app()->createUrl("/_teacher/messages/index") ?>')">
            Скасувати
        </button>
    </form>
</div>



