<?php

namespace frontend\controllers;
use Yii;
use common\models\Category;
use common\models\Article;
use common\models\SmsLog;
use common\models\Tag;
use frontend\services\TagService;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\Controller;
use common\models\Cases;
use common\models\Carousel;
use api\modules\v1\models\CarouselItem;
use common\models\Page;
use common\models\CaseCategory;
use common\components\alisms\BaseSms;
use frontend\models\LoginForm;
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
        if (!(new \Detection\MobileDetect())->isMobile())
        {
           $image = CarouselItem::find()->where(['status'=>1,'carousel_id'=>1])->orderBy('sort asc')->all();
           $categories = Category::find()->orderBy(['sort' => SORT_ASC])->limit(6)->all(); 
        }else {
            //手机端分类
            $image = CarouselItem::find()->where(['status'=>1,'carousel_id'=>9])->orderBy('sort asc')->all();
            $categories = Category::find()->orderBy(['sort' => SORT_ASC])->limit(2)->all();
        }
  

        //case
       $case = Cases::find()->where(['is_top'=>1,'status'=>1])->limit(8)->all();
       //carousel
        $hotTags = TagService::hot();
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'categories' => $categories,
            'hotTags' => $hotTags,
            'case' => $case,
            'image'=> $image,
        ]);
    }
    
    public function actionProduct(){
        //判断是否是手机端
        if (!(new \Detection\MobileDetect())->isMobile())
        {
            $head_img = CarouselItem::find()->where(['carousel_id'=>4,'status'=>1])->orderBy('sort asc')->one();
        }else{
            $head_img = CarouselItem::find()->where(['carousel_id'=>12,'status'=>1])->orderBy('sort asc')->one();
        }
        
        $img1 = CarouselItem::find()->where(['carousel_id'=>5,'status'=>1])->limit(4)->orderBy('sort asc')->all();
        $img2 = CarouselItem::find()->where(['carousel_id'=>13,'status'=>1])->limit(4)->orderBy('sort asc')->all();
        $img3 = CarouselItem::find()->where(['carousel_id'=>14,'status'=>1])->limit(4)->orderBy('sort asc')->all();

       $detail_img = CarouselItem::find()->where(['carousel_id'=>6,'status'=>1])->orderBy('sort asc')->all();
       $pay_img = CarouselItem::find()->where(['carousel_id'=>7,'status'=>1])->orderBy('sort asc')->one();
       $order_img = CarouselItem::find()->where(['carousel_id'=>8,'status'=>1])->orderBy('sort asc')->one();
        
        return $this->render('product',[
            'head_img'=>$head_img,
            'img1'=>$img1,
            'img2'=>$img2,
            'img3'=>$img3,
            'detail_img'=>$detail_img,
            'pay_img'=>$pay_img,
            'order_img'=>$order_img,    
        ]);
    }
    
    public function actionFaq(){
        
       // $help = Page::find()->where(['use_layout'=>1,'slug' =>'help'])->orderBy('id asc')->all();
        $category = CaseCategory::find()->all();
        
        return $this->render('faq',[
            'category' => $category,
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
    
    public function actionSms(){
        
        \Yii::$app->response->format = 'json';
        $mobile = \Yii::$app->request->post('mobile');
        $scene = \Yii::$app->request->post('scene');
          if (empty($mobile)) {
         return ['status'=>0,'msg'=>'手机号不能为空'];
         }
         $sms = SmsLog::find()->where(['mobile'=>$mobile,'scene'=>$scene])->one();
         $now = time();
         if (!empty($sms)&&$sms['created_at']>$now-60) {
         return ['status'=>0,'msg'=>'请勿频繁操作！'];
         }
 /*         $ip=Yii::$app->request->userIP;
         if(yii::$app->seesion->get($ip)){
             if(time()-yii::$app->seesion->get('time')<60){
                 return ['status'=>0,'msg'=>'请勿频繁操作！'];
             }
         }
         yii::$app->session->set($ip,time()); */
         
         $code = strval(rand(100000, 999999));
         $data = array();
         $data['code'] = $code;
         $baseSms =  new BaseSms();
         $result = $baseSms->sendSms($mobile, 'SMS_170348536','几何线', $data);
         // $result = $baseSms->sendSms($mobile, $templateCode,$signName, $templateParam);
         if ($result['status']==0) {
         return $result;
         }
         
         if(empty($sms)){
         $sms = new SmsLog();
         $sms->mobile = $mobile;
         }
         $sms->scene = $scene;
         $sms->code = $code;
         $sms->created_at = time();
         $sms->status=1;
         if ($result['status']==0) {
         $sms->status=0;
         $sms->error_msg = $result['msg'];
         }else{
         $sms->status=1;
         }
         if (!$sms->save()) {
         $result['status']=0;
         $result['msg'] = current($sms->getErrors());
         }
         return $result; 
    }
    
    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $data=yii::$app->request->post();
             $model = new LoginForm();
            
            if ($model->load($data,'') && $model->login()) {
             
             return ['status'=>1,'msg'=>'成功'];
            } else{
                return ['status'=>0,'msg'=>'失败'];
            }

       
       
    }
}
