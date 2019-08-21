<?php
/**
 * 
 * 
 * Author wsyone wsyone@faxmail.com
 * Time:2019年8月19日下午5:47:53
 * Copyright:钦州市友加信息科技有限公司
 * site:https://www.jihexian.com
 */
namespace frontend\controllers;
use Yii;
use common\components\weixin\BaseWechat;
use common\models\Token;
use common\modules\user\models\Auth;
use common\modules\user\models\User;
class WxController  {
   
    
    //获取登录二维码
    public function qrcode(){
    
        if (yii::$app->user->isGuest){
            $scene_id = $this->get_scene_id();
            $weObj=new BaseWechat();
            $ticket = $weObj->getQRCode($scene_id,0,600);
            $url = $weObj->getQRUrl($ticket['ticket']);
            echo $url;
        }
    }	
    public function actionReceive($param) {
      $weObj=new BaseWechat();
      $flag = $weObj->valid();
      if ($flag){
          $type = $weObj->getRev()->getRevType();
          switch($type) {
              case \Wechat::MSGTYPE_TEXT:
                  //$weObj->text("hello, I'm wechat")->reply();
                  $weObj->transfer_customer_service()->reply();
                  exit;
                  break;
              case \Wechat::MSGTYPE_EVENT:
                  $eventArray = $weObj->getRevEvent();
                  $event = $eventArray['event'];
                  $eventKey = $eventArray['key'];
                  $openid = $weObj->getRevFrom();
                  $userInfo = $weObj->getUserInfo($openid);
                  switch ($event){
                      case \Wechat::EVENT_SCAN:
                          if($eventKey=1000){
                              $weObj->text('登录成功')->reply();
                              break;
                          }else{
                              //扫码登录，记录openid
                             // M('token')->where(array('cd'=>$eventKey))->save(array('wx_openid'=>$openid));
                             Token::updateAll(['wx_openid'=>$openid],['scene_id'=>$eventKey]);
                              $this->setUser($openid,$userInfo);
                              break;
                          }        
                      case \Wechat::EVENT_SUBSCRIBE:
                          //关注记录，新增记录并记录openid
                          $this->setUser($openid,$userInfo);
                          $eventKey = explode("_", $eventKey);//关注事件需要处理字符串
                        //  M('token')->where(array('scene_id'=>$eventKey[1]))->save(array('wx_openid'=>$openid));
                          Token::updateAll(['wx_openid'=>$openid],['scene_id'=>$eventKey[1]]);
                          $weObj->text("Hi，欢迎来到几何线系统")->reply();
                          break;
                    
                      default:
                          break;
                  }
                  break;
              default:
                  $weObj->text("Hi，欢迎来到几何线系统")->reply();
          }
      }
 
    }
    
    //设置微信用户关联到用户表
    private function setUser($openid,$userInfo){
        
        /** @var Auth $auth */
        $auth = Auth::find()->where([
            'source' => 'wx-qrcode',
            'source_id' => $openid,
        ])->one(); 
        
        if (empty($auth)){

            $password = Yii::$app->security->generateRandomString(6);
            $name=User::findByUsername($userInfo['nickname']) ? $userInfo['nickname'] . '_' . mt_rand(1000, 9999) : $userInfo['nickname'];
            $user = new User([
                'scenario' => 'create',
                'username' =>$name,
                'email' => $name.'@qq.com',
                'password' => $password,
            ]);
            $user->generateAuthKey();
            $user->generatePasswordResetToken();
            
            $transaction = User::getDb()->beginTransaction();
            
            if ($user->save()) {
                $auth = new Auth([
                    'user_id' => $user->id,
                    'source' => 'wx-qrcode',
                    'source_id' => (string)$openid,
                ]);
                if ($auth->save()) {
                    $transaction->commit();
                } else {
                    Yii::$app->getSession()->setFlash('error', [
                        Yii::t('app', 'Unable to save account: {errors}', [
                            'errors' => json_encode($auth->getErrors()),
                        ]),
                    ]);
                }
            } else {
                Yii::$app->getSession()->setFlash('error', [
                    Yii::t('app', 'Unable to save user: {errors}', [
                        'errors' => json_encode($user->getErrors()),
                    ]),
                ]);
            }
        }
    }
   
    
    //检查是否已经扫码
    public function checkLogin(){
        $sessionId = session_id();
        $token=Token::find()->where(['sid'=>$sessionId])->select(['wx_openid'])->one();
        $auth = Auth::find()->where([
            'source' => 'wx-qrcode',
            'source_id' => $token['wx_openid'],
        ])->one(); 
        if (!empty($auth)){
            $user=$auth->user;
            if ( yii::$app->user->login($user)){
                echo json_encode(array('flag'=>true,'msg'=>'登录成功'));
            }else{
                echo json_encode(array('flag'=>false));
            }
        }else{
            echo json_encode(array('flag'=>false));
        }
        
    }
    
    private  function get_scene_id(){
        $sessionId = session_id();
        $token=Token::find()->where(['sid'=>$sessionId])->one();
        $scene_id = $now = time();
        if (empty($token)){
            $model=new Token();
            $model->scene_id=$scene_id;
            $model->create_time=$now;
            $model->update_time=$now;
            $model->sid=$sessionId;
            $model->add();
        }else{
            $sceneId = $token['scene_id'];
            $sceneTime = $token['update_time'];
            if (($sceneTime+6000)>=$now){//十分钟
                //session('scene_id',$sceneId);
                //session('scene_time',$sceneTime);
                return $sceneId;
            }else {
                //session('scene_id',$scene_id);
                //session('scene_time',$now);
                //生成scene_id并记录到token表
                $data=Token::find()->wehre(['sid'=>$sessionId])->one();
                $data->scene_id=$scene_id;
                $data->create_time=$now;
                $data->update_time=$now;
                $data->save();
            }
        }
        
        return $scene_id; 
    }
    
    
}