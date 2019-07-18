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
            'id',
            'title',
            'cover',
            'qr_cover',
            'create_time:datetime',
            'update_time:datetime',
            'status',
            'category_id',
            'is_top',
            'desc',
          
            'content',
        ],
    ]) ?>
    </div>
</div>
