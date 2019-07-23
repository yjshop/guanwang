<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%visitor}}".
 *
 * @property integer $id
 * @property string $admin
 * @property integer $tel
 * @property string $company
 * @property string $domain
 * @property integer $app_id
 * @property string $class
 * @property integer $qq
 * @property string $weixin
 * @property string $email
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 */
class Visitor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%visitor}}';
    }
    
    public function behaviors()
    {
        $behaviors = [ 
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                   
                ],
            ],
        ];
        return $behaviors;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tel', 'app_id', 'qq','status'], 'integer'],
            [['company', 'domain', 'app_id', 'class', 'weixin'], 'required'],
            [['admin', 'company', 'domain', 'class', 'weixin', 'email'], 'string', 'max' => 255],
            [['email'],'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '序号',
            'admin' => '责任人',
            'tel' => '电话号码',
            'company' => '公司或企业',
            'domain' => '域名',
            'app_id' => '应用的id',
            'class' => '套餐',
            'qq' => 'QQ号码',
            'weixin' => '微信号',
            'email' => '邮箱',
            'created_at' => '生成时间',
            'updated_at' => '更改时间',
            'status' => '状态',
        ];
    }
}
