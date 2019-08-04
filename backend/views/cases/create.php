<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Cases */

$this->title = Yii::t('app', '创建案例');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '案例列表'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cases-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
