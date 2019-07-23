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
use yii;
use common\models\Cases; 
use common\models\CasesSearch;
class CasesController extends Controller{
    
    public function actionView(){
        
        $id=yii::$app->request->get('id');
        $data= Cases::find()->where(['status'=>1,'id'=>$id])->one();
        $top1= Cases::find()->where(['status'=>1])->all();
        //取随机下标
        $k = array_rand($top1,4);
        $top2=array();
        //遍历放入数组中
        for($i=0;$i<4;$i++)
        {
            $top2[$i] = $top1[$k[$i]];
        }
        return $this->render('view',[
            'data'=>$data,
            'top2'=>$top2,
        ]); 
    }

    public function actionIndex(){
       $data['status']=1;
       $p= new CasesSearch();
       $dataProvider=$p->search1($data);
       return $this->render('index',[
           'dataProvider'=>$dataProvider,
       ]); 

    }
}