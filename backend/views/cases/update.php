<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Cases */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => '案例',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '案列列表'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', '更新');
?>
<div class="cases-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
