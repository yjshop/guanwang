<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\CaseCategory;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CasesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '案例列表');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('content-header') ?>
<?= $this->title . ' ' . Html::a(Yii::t('app', '创建案例'), ['create'], ['class' => 'btn btn-primary btn-flat btn-xs']) ?>
<?= Html::a(Yii::t('app', '添加分类'), ['cases-category/index'], ['class' => 'btn btn-primary btn-flat btn-xs']) ?>
<?php $this->endBlock() ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box box-primary">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
        'columns' => [
                    [
                        'attribute'=>'id',
                        'contentOptions' => [
                            'width'=>'50'
                        ]
                    ],
                    'title',
                    // 'cover',
                    //'qr_cover',
                    //'create_time:datetime',
                    'update_time:datetime', 
            
                        [
                            'attribute'=>'category_id',
                            'value'=>'caseCategory.title',
                            'filter'=>CaseCategory::find()
                            ->select(['title','id'])
                            ->orderBy('id')
                            ->indexBy('id')
                            ->column(),
                        ],
            
                        'desc',
            
                        [
                            'class' => 'backend\widgets\grid\SwitcherColumn',
                            'attribute' => 'is_top',
                            'contentOptions' => [
                                'width'=>'50'
                            ]
                        ],
            
                        [
                            'class' => 'backend\widgets\grid\SwitcherColumn',
                            'attribute' => 'status',
                            'contentOptions' => [
                                'width'=>'60'
                            ]
                        ],    
                        //'content',
                        ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
