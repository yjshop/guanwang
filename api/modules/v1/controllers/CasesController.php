<?php
namespace api\modules\v1\controllers;
use api\common\controllers\Controller;
use api\modules\v1\models\Cases;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class CasesController extends Controller
{
    /**
     * @api {get} /v1/articles 文章列表
     * @apiVersion 1.0.0
     * @apiName index
     * @apiGroup Article
     *
     * @apiParam {Integer} [cid] 分类ID.
     * @apiParam {String} [module]  模块类型
     *
     */
    public function actionIndex($cid = null, $module = null)
    {
        $query = cases::find()
        ->andFilterWhere(['status' => 1]);
        $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'sort' => [
                        'defaultOrder' => [
                                'id' => SORT_DESC
                        ]
                ]
        ]);
        return $dataProvider;
    }
    /**
     * @api
     * @apiVersion 1.0.0
     * @apiName view
     * @apiGroup Article
     *
     */
    public function actionView($id)
    {
        request()->setQueryParams(['expand'=>'data']);
        $model = Cases::find()->published()->where(['id' => $id])->with('data')->one();
        if ($model === null) {
            throw new NotFoundHttpException('not found');
        }
        $model->addView();
        return $model;
    }
}