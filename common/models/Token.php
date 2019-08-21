<?php

namespace common\models;

use Yii;

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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'create_time', 'update_time'], 'integer'],
            [['scene_id', 'wx_openid', 'sid'], 'string', 'max' => 255],
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
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'sid' => 'Sid',
        ];
    }
}
