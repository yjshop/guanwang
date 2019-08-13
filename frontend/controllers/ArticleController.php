<?php
/**
 * author: yidashi
 * Date: 2015/11/27
 * Time: 11:54.
 */
namespace frontend\controllers;

use common\models\Category;
use common\models\Article;
use common\models\Tag;
use frontend\services\ArticleService;
use frontend\services\TagService;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii;
use GuzzleHttp\Psr7\LimitStream;
class ArticleController extends Controller
{
    /**
     * 分类文章列表
     * @param mixed $cate
     * @param mixed $module
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionIndex($cate = null, $module = null)
    {
        // 热门标签
        $hotTags = TagService::hot();
        
        $case = Article::find()->where(['category_id'=>41])->limit(5)->orderBy('id asc')->all();
        
        //如果搜索条件存在
        if(Yii::$app->request->isPost)
        {
            $query = Article::find()->where(['like','title',Yii::$app->request->post('title')])->published();
            $category = null;
            if (!empty($cate)) {
                $category = Category::findByIdOrSlug($cate);
                if (empty($category)) {
                    throw new NotFoundHttpException('分类不存在');
                }
                $query = $query->andFilterWhere(['category_id' => $category->id]);
            }
            
            $query->andFilterWhere(['module' => $module]);
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'sort' => [
                    'defaultOrder' => [
                        'published_at' => SORT_DESC
                    ],
                    'attributes' => [
                        'published_at',
                        'view'
                    ]
                ],
                'pagination' => [
                    'pageSize' => isset($params['per-page']) ? $params['per-page'] : 10,
                ]
                
            ]);
            
            return $this->render('index', [
                'dataProvider' => $dataProvider,
                'category' => $category,
                'hotTags' => $hotTags,
                'case'=>$case,
            ]);
                    
        }else {
        //搜索条件不存在
        
        $query = Article::find()->published();
        $category = null;
        if (!empty($cate)) {
            $category = Category::findByIdOrSlug($cate);
            if (empty($category)) {
                throw new NotFoundHttpException('分类不存在');
            }
            $query = $query->andFilterWhere(['category_id' => $category->id]);
        }
        
        $query->andFilterWhere(['module' => $module]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'published_at' => SORT_DESC
                ],
                'attributes' => [
                    'published_at',
                    'view'
                ]
            ],
            'pagination' => [
                'pageSize' => isset($params['per-page']) ? $params['per-page'] : 10,
            ]
            
        ]);
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'category' => $category,
            'hotTags' => $hotTags,
            'case'=>$case,
        ]);
    }
    }
    

    
    
    /**
     * 标签文章列表
     */
    public function actionTag($name)
    {
        /* @var $tag Tag */
        $tag = Tag::find()->where(['name' => $name])->one();
        if (empty($tag)) {
            throw new NotFoundHttpException('标签不存在');
        }
        $query = $tag->getArticles();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'published_at' => SORT_DESC
                ]
            ]
        ]);
        // 热门标签
        $hotTags = Tag::find()->orderBy('article desc')->all();
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'tag' => $tag,
            'hotTags' => $hotTags
        ]);
    }
    /**
     * 文章详情
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionDetail($id)
    {  
        
        $case = Article::find()->where(['category_id'=>41])->limit(5)->orderBy('id desc')->all();
        
        $model = Article::find()->published()->andWhere(['id' => $id])->one();
        if ($model === null) {
            throw new NotFoundHttpException('not found');
        }
        $model->addView();
        yii::$app->session->set('module',$model->module);
        // sidebar
        $hots = ArticleService::hots($model->category_id);
        
        // 上下一篇
        $next = Article::find()->andWhere(['>', 'id', $id])->one();

        $prev = Article::find()->andWhere(['<', 'id', $id])->orderBy('id desc')->one();
   

        return $this->render($model->module . '/Detail', [
            'model' => $model,
            'case' =>$case,
            'hots' => $hots,
            'next' => $next,
            'prev' => $prev
        ]);
    }
}
