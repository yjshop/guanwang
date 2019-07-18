<?php

namespace common\models;
use yii\caching\TagDependency;
use Yii;

/**
 * This is the model class for table "{{%case_category}}".
 *
 * @property integer $id
 * @property integer $pid
 * @property string $title
 * @property string $slu
 * @property integer $create_time
 * @property integer $update_time
 * @property string $module
 */
class CaseCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%case_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'create_time', 'update_time'], 'integer'],
            [['title', 'slu'], 'string', 'max' => 50],
            ['title','required']
           
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'pid' => 'Pid',
            'title' => 'Title',
            'slu' => 'Slu',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'module' => 'Module',
        ];
    }
    
    public static function lists($module = null)
    {
        $list = Yii::$app->cache->get(['shopCategoryList', $module]);
        if ($list === false) {
            $query = static::find();
            if ($module) {
                $query->where(new Expression("FIND_IN_SET('{$module}', module) "));
            }
            $list = $query->asArray()->all();
            Yii::$app->cache->set(['shopCategoryList', $module], $list, 0, new TagDependency(['tags' => ['shopCategoryList']]));
        }
        return $list;
    }
    
    public static function getDropDownList($tree = [], &$result = [], $deep = 0, $separator = '--')
    {
        $deep++;
        foreach($tree as $list) {
            $result[$list['id']] = str_repeat($separator, $deep-1) . $list['title'];
            if (isset($list['children'])) {
                self::getDropDownList($list['children'], $result, $deep);
            }
        }
        return $result;
    }
}
