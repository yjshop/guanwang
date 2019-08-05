<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Article;
use common\models\Tag;
use frontend\services\TagService;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\Controller;
use common\models\Cases;
use common\models\Carousel;
use api\modules\v1\models\CarouselItem;
use common\models\Page;

/**
 * Site controller.
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => 'yii\filters\PageCache',
                'only' => ['sitemap'],
                'duration' => 60 * 60,
                'variations' => [
                    \Yii::$app->language,
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Article::find()->published(),
            'sort' => [
                'defaultOrder' => [
                    'is_top' => SORT_DESC,
                    'published_at' => SORT_DESC
                ]
            ]
        ]);
        //cateories
       $categories = Category::find()->orderBy('id asc')->limit(6)->asArray()->all();
        //case
       $case = Cases::find()->where(['is_top'=>1,'status'=>1])->limit(8)->all();
       //carousel
       $carouselitem = CarouselItem::find()->where(['status'=>1,'carousel_id'=>1])->orderBy('sort asc')->limit(3)->all();
        $hotTags = TagService::hot();
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'categories' => $categories,
            'hotTags' => $hotTags,
            'case' => $case,
            'carouselitem'=> $carouselitem,
        ]);
    }
    
    public function actionProduct(){
        
       $head_img = CarouselItem::find()->where(['carousel_id'=>4,'status'=>1])->orderBy('sort asc')->one();
       $market_img = CarouselItem::find()->where(['carousel_id'=>5,'status'=>1])->limit(4)->orderBy('sort asc')->all();
       $detail_img = CarouselItem::find()->where(['carousel_id'=>6,'status'=>1])->limit(4)->orderBy('sort asc')->all();
       $pay_img = CarouselItem::find()->where(['carousel_id'=>7,'status'=>1])->orderBy('sort asc')->one();
       $order_img = CarouselItem::find()->where(['carousel_id'=>8,'status'=>1])->orderBy('sort asc')->one();
        
        return $this->render('product',[
            'head_img'=>$head_img,
            'market_img'=>$market_img,
            'detail_img'=>$detail_img,
            'pay_img'=>$pay_img,
            'order_img'=>$order_img,    
        ]);
    }
    
    public function actionFaq(){
        
        $help = Page::find()->where(['use_layout'=>1,'slug' =>'help'])->orderBy('id asc')->all();
        
        return $this->render('faq',[
            'help' => $help,
        ]);
    }
    /**
     * 网站地图，百度搜索引擎爬虫用.
     *
     * @return array
     */
    public function actionSitemap()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_XML;
        \Yii::$container->set('yii\web\XmlResponseFormatter', ['rootTag' => 'urlset', 'itemTag' => 'url']);
        $urls = [];
        $models = Article::find()->published()->select('id')->orderBy(['id' => SORT_DESC])->each(20);
        foreach ($models as $model) {
            $url = [];
            $url['loc'] = Url::to(['/article/view', 'id' => $model->id], true);
            $urls[] = $url;
        }

        return $urls;
    }
}
