<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use common\modules\attachment\behaviors\UploadBehavior;
use Yii;

/**
 * This is the model class for table "{{%cases}}".
 *
 * @property integer $Id
 * @property string $title
 * @property string $cover
 * @property string $qr_cover
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $status
 * @property integer $category_id
 * @property integer $is_top
 * @property string $desc
 * @property string $cetagory
 * @property string $content
 */
class Cases extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cases}}';
    }
    
    
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $behaviors = [
        
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['create_time'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['update_time'],
                ],
            ],
            
            //自定义字段，文件路径放在其他数据库。
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'cover',
                'entity' => __CLASS__
            ],
           [
                'class' => UploadBehavior::className(),
                'attribute' => 'qr_cover',
                'entity' => __CLASS__
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
            [['create_time', 'update_time', 'category_id','status', 'is_top'], 'integer'],
            [['title'], 'string', 'max' => 50],
            [['desc'], 'string', 'max' => 255],
            [['content'], 'string'],
            [['cover', 'qr_cover', 'desc', 'content'], 'safe'],
            [['title','content'],'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '编号',
            'title' => '标题',
            'cover' => '封面',
            'qr_cover' => '二维码',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
            'status' => '状态',
            'category_id' => '分类ID',
            'is_top' => '置顶',
            'desc' => '描述',
            'cetagory' => '分类',
            'content' => '内容',
        ];
    }
}
