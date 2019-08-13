<?php
namespace frontend\controllers;
use yii\web\Controller;
use common\models\Visitor;
use Yii;

class VisitorController extends Controller
{
    public function actionIndex()
    {
        
        if(Yii::$app->request->isPost){
            $count=Visitor::find()
            ->where(['or',['status'=>1,'domain'=>Yii::$app->request->post('domain')],['status'=>1,'app_id'=>Yii::$app->request->post('domain')]])
            ->count();
            if($count>0){
                $label = "恭喜您使用的是正版授权的软件！！！";
            }else{
                $label = "很遗憾:您使用的是盗版软件，不享受任何服务支持。详情咨询0777-3899730";
            }
            return $this->render('index',[
                'label'=>$label,
                'domain'=>Yii::$app->request->post('domain'), 
            ]);
        }else{
            return $this->render('index');
        }
         
    }
}