<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Visitor */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Visitors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'admin',
            'tel',
            'company',
            'domain',
            'app_id',
            'class',
            'qq',
            'weixin',
            'email:email',
            'created_at',
            'updated_at',
            'status',
        ],
    ]) ?>
    </div>
</div>
