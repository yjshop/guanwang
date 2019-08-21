<?php
namespace common\components\weixin;
use Yii;
$excelpath = dirname(Yii::$app->basePath).DIRECTORY_SEPARATOR.'common'.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'weixin'.DIRECTORY_SEPARATOR;
require_once($excelpath."lib/Wechat.php"); 
class BaseWechat extends \Wechat{
	public function __construct()
	{
		    
		$options = array(
				'token'=>env('wx_token'),
				'encodingAesKey'=>env('wx_encodingAesKey'),
				'appid'=>env('wx_appid'),
				'appsecret'=>env('wx_appsecret'),
				'debug'=>env('YII_DEBUG'),				
		);		
		parent::__construct($options);
	}
}