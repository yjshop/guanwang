<?php

namespace common\modules\user\models;
use Yii;
use yii\base\Model;
use common\modules\user\models\User;
use common\models\SmsLog;

/**
 * Login form.
 */
class MobileLogin extends Model
{
    public $username;
    public $password;
    public $mobile;
    public $rememberMe = true;
    public $verifyCode;
    private $_user;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            ['mobile','required'],
            ['mobile','match','pattern'=>'/^1(3|4|5|7|8)\d{9}$/','message'=>'请填写正确手机号！'],
            // rememberMe must be a boolean value
            ['verifyCode', 'checkSms'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'username' => '用户名/邮箱/手机号码',
            'password' => '密码',
            'rememberMe' => '记住我',
        ];
    }
    
    
    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }
    
    
    public function checkSms(){
        
        $sms = SmsLog::find()->where(['mobile'=>$this->mobile,'scene'=>1,'code'=>$this->verifyCode])->one();
        if (empty($sms)) {
            $this->addError('verifyCode','验证码错误，请重新输入！');
        }else{
            if ($sms->created_at+600<time()) {
                $this->addError('verifyCode','验证码过期，请重新获取！');
            }
        }
    }
    /**
     * Finds user by [[username]].
     *
     * @return User|null
     */
    protected function getUser()
    {
        $this->_user = User::findByUsernameOrEmail($this->mobile);
        if ($this->_user === null) {

            $password = Yii::$app->security->generateRandomString(6);
            $user = new User([
                'scenario' => 'create',
                'username' =>substr($this->mobile,0,-4),
                'mobile'=>$this->mobile,
                'email' =>$this->mobile.'@mobile.com',
                'password' => $password,
            ]);
            $user->generateAuthKey();
            $user->generatePasswordResetToken();
            if ($user->save()) {
                $this->_user=$user;
            }
        }
        
        
        
        return $this->_user;
    }
}
