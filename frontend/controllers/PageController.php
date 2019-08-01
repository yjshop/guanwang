<?php
/**
 * author: yidashi
 * Date: 2015/12/24
 * Time: 16:13.
 */
namespace frontend\controllers;

use common\models\Page;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PageController extends Controller
{
    public function actionSlug($slug)
    {
        $show = 'aboutus';
        $page = Page::find()->where(['slug' => $slug])->one();
        if (empty($page)) {
            throw new NotFoundHttpException('页面不存在');
        }
        $this->layout = $page->use_layout ? 'main' : false;

        return $this->render('index', [
            'page' => $page,
            'show'=>$show,
        ]);
    }
    
    public function actionIntelligence()
    {
        $show = 'one';
        return $this->render('intelligence',[
            'show'=>$show,
        ]);
    }
    
    public function actionCall()
    {
        $show = 'two';
        return $this->render('call',[
            'show'=>$show,
        ]);
    }
    
}
