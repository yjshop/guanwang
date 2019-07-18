<?php
/**
 * 
 * Author 
 * Time:2019年7月18日 下午4:12:10
 * Copyright:钦州市友加信息科技有限公司
 * site:https://www.jihexian.com
 */
namespace frontend\controllers;
use yii\web\Controller;
use frontend\services\ArticleService;
use yii;
use yii\web\NotFoundHttpException;
use common\models\Cases; 
use common\models\CasesSearch;
class CasesController extends Controller{
    
    public function actionView(){
        
        $id=yii::$app->request->get('id');
        $data= Cases::find()->where(['status'=>1,'id'=>$id])->one();

        $top= Cases::find()->where(['status'=>1])->all();
        return $this->render('view',[
            'data'=>$data,
            'top'=>$top
        ]); 
    }
    
    
    
    public function actionIndex(){
       $data['status']=1;
       $p= new CasesSearch();
       $dataProvider=$p->search($data);
       return $this->render('index',[
           'dataProvider'=>$dataProvider,
   
       ]); 

    }
}