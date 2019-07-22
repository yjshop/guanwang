<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CasesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cases');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('content-header') ?>
<?= $this->title . ' ' . Html::a(Yii::t('app', 'Create Cases'), ['create'], ['class' => 'btn btn-primary btn-flat btn-xs']) ?>
<?php $this->endBlock() ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box box-primary">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
        'columns' => [
                    'id',
                    'title',
                   // 'cover',
                    //'qr_cover',
                    //'create_time:datetime',
                    // 'update_time:datetime',
                  
                   // 'category_id', 
                        [
                            'class' => 'backend\widgets\grid\SwitcherColumn',
                            'attribute' => 'is_top'
                        ],
                        [
                            'class' => 'backend\widgets\grid\SwitcherColumn',
                            'attribute' => 'status'
                        ],
                    // 'desc',
                  
                    // 'content',
                        ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
