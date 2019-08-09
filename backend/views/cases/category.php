<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\PageCategory */
/* @var $form ActiveForm */
?>
<div class="category">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title') ?>
    
        <div class="form-group">
            <?= Html::submitButton('添加分类', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- _category -->

