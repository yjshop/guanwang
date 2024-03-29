<?php

namespace common\models;
use common\behaviors\CommentBehavior;
use common\behaviors\MetaBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\HtmlPurifier;
use yii\helpers\StringHelper;

/**
 * This is the model class for table "{{%page}}".
 *
 * @property int $id
 * @property int $use_layout
 * @property string $content
 * @property string $title
 * @property integer $markdown
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%page}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id'],'integer'],
            [['content', 'title', 'slug'], 'required'],
            [['content'], 'string'],
            ['markdown', 'default', 'value' => $this->getIsMarkdown()],
            [['use_layout'], 'in', 'range' => [0, 1]],
            [['title'], 'string', 'max' => 50],
            ['content', 'filterHtml']
        ];
    }

    public function filterHtml($attribute)
    {
        $this->$attribute = HtmlPurifier::process($this->$attribute, function ($config) {
            $config->set('HTML.Allowed', 'p[style],a[href|title],img[src|title|alt|class],h3,ul,ol,li,span,b,strong,hr,code,table,tbody,tr,td');
            // 清除空标签
            $config->set('AutoFormat.RemoveEmpty', true);
        });
    }

    /**
     * 没有指定markdown情况下默认编辑器是否为markdown
     * @return int
     */
    public function getIsMarkdown()
    {
        return \Yii::$app->config->get('article_editor_type') == 'markdown' ? 1 : 0;
    }

    public function getProcessedContent()
    {
        return $this->markdown ? \yii\helpers\Markdown::process($this->content) : $this->content;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'use_layout' => '是否显示',
            'content' => '回答',
            'title' => '问题',
            'slug' => '标识',
            'category_id'=>'分类',
        ];
    }

    public function attributeHints()
    {
        return [
            'name' => '（影响url）'
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            [
                'class' => MetaBehavior::className(),
            ],
            [
                'class' => CommentBehavior::className()
            ]
        ];
    }

    public function getMetaData()
    {
        $model = $this->getMetaModel();

        $title = $model->title ?  : $this->title;

        $description = $model->description ?  : StringHelper::truncate(strip_tags($this->content), 150);

        return [$title, $description, $model->keywords];
    }
    
    public function getCaseCategory(){
        // hasOne要求返回两个参数 第一个参数是关联表的类名 第二个参数是两张表的关联关系
        // 这里id是casesCategory表的id, 关联cases表的id
        return $this->hasOne(CaseCategory::className(), ['id' => 'category_id']);
    }
}
