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
            'title' => '分类名称',
            'slu' => 'Slu',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
            'module' => 'Module',
        ];
    }
    
    //下拉列表的方法----------------
    public static function lists()
    {
        $list = Yii::$app->cache->get('casesCategoryList');
        if ($list === false) {
            $query = static::find();
            
            $list = $query->asArray()->all();
            Yii::$app->cache->set('casesCategoryList', $list);
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
