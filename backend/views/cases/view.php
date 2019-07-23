<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use Egulias\EmailValidator\Warning\LabelTooLong;

/* @var $this yii\web\View */
/* @var $model common\models\Cases */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$jinyong ='';
$top = '';
if($model->status == 1)
{
    $jinyong = "禁用";
}else {
    $jinyong = "不禁用";
}
if ($model->is_top == 1)
{
    $top = "置顶";
}else{
    $top = "不置顶";
}
?>
<div class="box box-primary">
    <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'category_id',
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
            [
               'label' =>'禁用状态',
                'value' =>$jinyong,  
            ],
            //'status',
            [

                'label' =>'置顶',
                'value' =>$top,

            ],
            'desc',
            'content',
        ],
        'template' => '<tr><th>{label}</th><td>{value}</td></tr>',
        'options' => ['class' => 'table table-striped table-bordered detail-view'],
    ]) ?>
    </div>
</div>
