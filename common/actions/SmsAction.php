<?php
/**
 * Author vamper 944969253@qq.com
 * Time:2019年1月3日 上午11:47:51
 * Copyright:钦州市友加信息科技有限公司
 * site:https://www.jihexian.com
 */
namespace common\actions;

use common\models\Tag;
use yii\base\Action;
use common\models\SmsLog;
use common\logic\SmsLogic;
use Yii;
use common\modules\config\models\Config;
use yii\helpers\Json;

class SmsAction extends Action
{
    
    public function run()
    {
        \Yii::$app->response->format = 'json';
        $mobile = \Yii::$app->request->post('mobile');
        $scene = \Yii::$app->request->post('scene');
        $result = [];
        $smsLogic = new SmsLogic();
        switch ($scene){
            case 1://验证身份
                $code = strval(rand(100000, 999999));
                $data = array();
                $data['code'] = $code;
                $data['username'] = $mobile;
                $config = Config::find()->where(['name'=>'sms_commom_tmp'])->one();
                $value = Json::decode($config['value']);
                $templateCode = $value['commonTemplateCode'];
                $signName= $value['signName'];   
                $templateParam = $smsLogic->getTempParams(1, $data);
                $result = $smsLogic->sendSms($mobile, $templateCode, $templateParam,  $signName, $scene);
                break;
            case 2:
                $code = strval(rand(100000, 999999));
                $data['code'] = $code;
                $data['username'] = $mobile;
                $config = Config::find()->where(['name'=>'sms_commom_tmp'])->one();
                $value = Json::decode($config['value']);
                $templateCode = $value['commonTemplateCode'];
                $signName= $value['signName'];
                $templateParam = $smsLogic->getTempParams(2, $data);
                $result = $smsLogic->sendSms($mobile, $templateCode, $templateParam,  $signName, $scene);
                break;
            default:
                $code = strval(rand(100000, 999999));
                $data['code'] = $code;
                $data['username'] = $mobile;
                $templateParam = $smsLogic->getTempParams(1, $data);
                $config = Config::find()->where(['name'=>'sms_commom_tmp'])->one();
                $value = Json::decode($config['value']);
                $templateCode = $value['commonTemplateCode'];
                $signName= $value['signName'];
               
                $result = $smsLogic->sendSms($mobile, $templateCode, $templateParam,  $signName, $scene);
                break;
        }       
        
        return $result;
    }
}