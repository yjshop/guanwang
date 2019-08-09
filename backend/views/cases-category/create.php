<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CaseCategory */

$this->title = Yii::t('app', 'Create Case Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Case Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="case-category-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
