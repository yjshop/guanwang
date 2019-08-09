<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CaseCategory */

$this->title = Yii::t('app', '创建案列分类');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '案列分类'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="case-category-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
