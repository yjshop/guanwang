<?php
namespace common\components\alisms;

use Aliyun\Core\Config;
use Aliyun\Core\DefaultAcsClient;
use Aliyun\Core\Profile\DefaultProfile;
use Aliyun\Api\Sms\Request\V20170525\SendSmsRequest;
use Yii;

require_once dirname(__DIR__) . '/alisms/vendor/autoload.php';

Config::load();

class BaseSms{
    static $acsClient = null;
    
    /**
     * 取得AcsClient
     *
     * @return DefaultAcsClient
     */
    public static function getAcsClient() {
        //产品名称:云通信短信服务API产品,开发者无需替换
        $product = "Dysmsapi";
        
        //产品域名,开发者无需替换
        $domain = "dysmsapi.aliyuncs.com";
        
        // TODO 此处需要替换成开发者自己的AK (https://ak-console.aliyun.com/)
        //$accessKeyId = "LTAI4wjZ0RgdGvfp"; // AccessKeyId        
        $accessKeyId = Yii::$app->config->get('accessKeyId');
        //$accessKeySecret = "Sj7XXcrHturiyL8JEtKB2CiiTwmxe6"; // AccessKeySecret
        $accessKeySecret = Yii::$app->config->get('accessKeySecret');
        // 暂时不支持多Region
        $region = "cn-hangzhou";
        
        // 服务结点
        $endPointName = "cn-hangzhou";
        
        
        if(static::$acsClient == null) {
            
            //初始化acsClient,暂不支持region化
            $profile = DefaultProfile::getProfile($region, $accessKeyId, $accessKeySecret);
            
            // 增加服务结点
            DefaultProfile::addEndpoint($endPointName, $region, $product, $domain);
            
            // 初始化AcsClient用于发起请求
            static::$acsClient = new DefaultAcsClient($profile);
        }
        return static::$acsClient;
    }
    
    /**
     * 发送短信
     * @param string mobile 接受短信手机号
     * @param string templateCode 模板CODE
     * @param string signName 签名名称
     * @param array templateParam 模板参数
     * @return 
     */
    public static function sendSms($mobile,$templateCode,$signName,$templateParam) {
        
        // 初始化SendSmsRequest实例用于设置发送短信的参数
        $request = new SendSmsRequest();
        
        //可选-启用https协议
        //$request->setProtocol("https");
        
        // 必填，设置短信接收号码
        $request->setPhoneNumbers($mobile);
        
        // 必填，设置签名名称，应严格按"签名名称"填写，请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/sign
        $request->setSignName($signName);
        
        // 必填，设置模板CODE，应严格按"模板CODE"填写, 请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/template
        $request->setTemplateCode($templateCode);
        
        // 可选，设置模板参数, 假如模板中存在变量需要替换则为必填项
        $request->setTemplateParam(json_encode($templateParam, JSON_UNESCAPED_UNICODE));
        
        // 可选，设置流水号
        //$request->setOutId("yourOutId");
        
        // 选填，上行短信扩展码（扩展码字段控制在7位或以下，无特殊需求用户请忽略此字段）
        //$request->setSmsUpExtendCode("1234567");
        
        // 发起访问请求
        $acsResponse = static::getAcsClient()->getAcsResponse($request);
        $response = json_decode(json_encode($acsResponse),true);
        $result = [];
        if ($response['Code']=='OK') {
            $result['status']=1;
        }else{
            $result['status']=0;
        }
        $result['msg']=$response['Message'];
        return $result;
    }
}