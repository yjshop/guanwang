<?php
namespace api\modules\v1\controllers;
use api\common\controllers\Controller;
use api\modules\v1\models\Cases;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
class CasesController extends Controller
{
    /**
     * @api 
     * @apiVersion 1.0.0
     * @apiName index
     * @apiGroup
     *
     */
    public function actionIndex($cid = null, $module = null)
    {
        $query = cases::find()->Where(['status' => 1]);
        $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'sort' => [
                        'defaultOrder' => [
                                'id' => SORT_DESC
                        ]
                ],
                'pagination' => [

               'defaultPageSize' => 8,
               'validatePage'=>false,

            ], 
        ]);
        return $dataProvider;
    }
    /**
     * @api
     * @apiVersion 1.0.0
     * @apiName view
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

