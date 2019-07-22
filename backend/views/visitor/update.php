<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Visitor */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Visitor',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Visitors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="visitor-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
