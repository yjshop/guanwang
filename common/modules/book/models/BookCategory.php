<?php

namespace common\modules\book\models;
use yii\caching\TagDependency;
use Yii;

/**
 * This is the model class for table "{{%book_category}}".
 *
 * @property integer $id
 * @property string $category_name
 * @property integer $created_at
 * @property integer $updated_at
 */
class BookCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%book_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'],'integer'],
            [['category_name'], 'required'],
            [['category_name'], 'string', 'max' => 80],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_name' => '分类',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    
    public static function lists()
    {
    
         $list = Yii::$app->cache->get('bookCategory');
        if ($list === false) {
            $query = static::find();
           
            $list = $query->asArray()->all();
            Yii::$app->cache->set('bookCategory', $list);
        }
        return $list;
    }
    
    public static function getDropDownList($tree = [], &$result = [], $deep = 0, $separator = '--')
    {
        $deep++;
        foreach($tree as $list) {
            $result[$list['id']] = str_repeat($separator, $deep-1) . $list['category_name'];
            if (isset($list['children'])) {
                self::getDropDownList($list['children'], $result, $deep);
            }
        }
        return $result;
    }
}
