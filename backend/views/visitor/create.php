<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Visitor */

$this->title = Yii::t('app', 'Create Visitor');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Visitors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visitor-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
