<?php

namespace common\models;

use Yii;
/**
 * This is the model class for table "{{%sms_log}}".
 *
 * @property integer $id
 * @property string $mobile
 * @property string $session_id
 * @property integer $created_at
 * @property string $code
 * @property integer $status
 * @property string $msg
 * @property integer $scene
 * @property string $error_msg
 */
class SmsLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sms_log}}';
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'scene'], 'integer'],//scene发送场景,1:用户注册/绑定用户,2:重置密码,3:客户下单,4:客户支付,5:商家发货,6:身份验证，7，设置支付密码，8，解绑手机号9，注册成为分销商
            [['error_msg'], 'string'],
            [['mobile'], 'string', 'max' => 11],
            [['session_id'], 'string', 'max' => 128],
            [['code'], 'string', 'max' => 10],
            [['msg'], 'string', 'max' => 255],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mobile' => 'Mobile',
            'session_id' => 'Session ID',
            'created_at' => 'Created At',
            'code' => 'Code',
            'status' => 'Status',
            'msg' => 'Msg',
            'scene' => 'Scene',
            'error_msg' => 'Error Msg',
        ];
    }
}
