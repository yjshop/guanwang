<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Cases */

$this->title = Yii::t('app', 'Create Cases');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cases-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
