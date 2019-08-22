<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%token}}".
 *
 * @property integer $id
 * @property string $scene_id
 * @property string $wx_openid
 * @property integer $create_time
 * @property integer $update_time
 * @property string $sid
 */
class Token extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%token}}';
    }

    
    public function behaviors(){
        return [
            
            [
                'class'=>TimestampBehavior::className(),
                'attributes'=>[
                    ActiveRecord::EVENT_BEFORE_INSERT => ['create_time'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['update_time'],
                ]
            ]
            
          
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'create_time', 'update_time','scene_id'], 'integer'],
            [['wx_openid', 'sid'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'scene_id' => 'Scene ID',
            'wx_openid' => 'Wx Openid',
            'create_time' => '创建时间',
            'update_time' => '修改时间',
            'sid' => 'Sid',
        ];
    }
}
