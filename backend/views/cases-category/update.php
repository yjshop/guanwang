<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CaseCategory */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Case Category',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Case Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="case-category-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
