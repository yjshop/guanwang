<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 2016/12/16
 * Time: 下午5:42
 */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use backend\widgets\ActiveForm;
use common\helpers\Tree;
use common\modules\attachment\widgets\SingleWidget;
use common\modules\book\models\BookCategory;

?>

<div class="box box-solid">
    <div class="box-body">
        <?php $form = Activeform::begin() ?>
        <?= $form->field($model, 'book_name') ?>
        
        <?= $form->field($model, 'category_id')->dropDownList(BookCategory::getDropDownList(Tree::build(BookCategory::lists()))) ?>
        
       <!--   $form->field($model, 'book_cover')->widget(\common\modules\attachment\widgets\SingleWidget::className())  -->
        
        <?= $form->field($model, 'book_cover')->widget(SingleWidget::className()) ?> 
        
        <?= $form->field($model, 'book_description')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'content')->widget(\common\widgets\EditorWidget::className(), $model->isNewRecord ? ['type' => request('editor') ? : config('page_editor_type')] : ['isMarkdown' => 0]) ?>


        <div class="form-group">
            <?= Html::submitButton('保存', ['class' => 'btn bg-maroon btn-flat btn-block']) ?>
        </div>
        <?php ActiveForm::end() ?>
    </div>
</div>
