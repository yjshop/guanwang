<?php

use common\helpers\Tree;
use common\modules\attachment\widgets\SingleWidget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\CaseCategory;

/* @var $this yii\web\View */
/* @var $model common\models\Cases */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
    <div class="box-body">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?> 
    <?= $form->field($model, 'category_id')->dropDownList(CaseCategory::getDropDownList(Tree::build(CaseCategory::lists()))) ?>
    <?= $form->field($model, 'desc')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'is_top')->checkbox() ?>
    <?= $form->field($model, 'cover')->widget(SingleWidget::className()) ?>   
    <?= $form->field($model, 'qr_cover')->widget(SingleWidget::className()) ?>
    <?= $form->field($model, 'content')->widget(\common\widgets\EditorWidget::className(), $model->isNewRecord ? ['type' => request('editor') ? : config('page_editor_type')] : ['isMarkdown' => 0]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat' : 'btn btn-primary btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>
