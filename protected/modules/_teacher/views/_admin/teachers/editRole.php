<?php
/**
 * @var $model StudentReg
 * @var $roles array
 * @var $role UserRoles
 * @var $attributes array
 */
?>
<div class="panel panel-default">
    <div class="panel-body">
        <ul class="nav nav-tabs">
            <?php
            foreach ($attributes as $key=>$attribute) { ?>
                <li  <?php if($key == 0) echo 'class="active"';?>><a href="#<?= $attribute["key"]; ?>" data-toggle="tab"><?= $attribute["title"]; ?></a>
                </li>
            <?php } ?>
        </ul>
        <div class="tab-content col col-md-12">
            <input type="number" hidden="hidden" value="<?= $model->id; ?>" id="user">
            <input type="text" hidden="hidden" value="<?= (string)$role; ?>" id="role">
            <?php if (!empty($attributes)) {
                foreach ($attributes as $key=>$attribute) {
                    ?>
                    <div class="tab-pane fade  <?php if($key == 0) echo 'in active';?>" id="<?= $attribute["key"]; ?>">
                        <div class="form-group">
                            <input type="text" hidden="hidden" value="<?= $attribute["key"]; ?>" id="attr">
                            <?php
                            switch ($attribute["type"]) {
                                case "module-list":
                                    $this->renderPartial('_moduleList', array(
                                        'attribute' => $attribute,
                                        'user' => $model->id,
                                        'role' => $role
                                    ));
                                    break;
                                case "students-list":
                                    $this->renderPartial('_studentsList', array(
                                        'attribute' => $attribute,
                                        'user' => $model->id,
                                        'role' => $role
                                    ));
                                    break;
                                default:
                                    $this->renderPartial('_numberAttribute', array(
                                        'attribute' => $attribute,
                                        'user' => $model->id,
                                        'role' => $role
                                    ));
                                    break;
                            } ?>
                        </div>
                    </div>
                <?php }
            } else { ?>
                Атрибутів для даної ролі не задано.
            <?php } ?>
        </div>
    </div>
</div>
