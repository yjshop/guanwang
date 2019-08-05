<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\CaseCategory;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CasesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '添加分类');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('content-header') ?>
<?php $this->endBlock() ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box box-primary">
        <div class="box-body">
            <?= GridView::widget([
                //'dataProvider' => $dataProvider,
                'category' => $category,
                'columns' => [
                    
                      'title',
                    
                 ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
