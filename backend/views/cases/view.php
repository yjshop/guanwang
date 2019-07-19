<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Cases */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            [
                'label' => '封面',
                'value' =>$model->cover,
                'format' => 'image',
            ],
            [
                'label' => '二维码',
                'value' =>$model->qr_cover,
                'format' => 'image',
            ],
            'create_time:datetime',
            'update_time:datetime',
            'status',
            'category_id',
            'is_top',
            'desc',
            'content',
        ],
        'template' => '<tr><th>{label}</th><td>{value}</td></tr>',
        'options' => ['class' => 'table table-striped table-bordered detail-view'],
    ]) ?>
    </div>
</div>
