<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 2016/12/15
 * Time: 下午2:05
 */

namespace common\modules\book\frontend\controllers;


use common\modules\book\models\Book;
use common\modules\book\models\BookChapter;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use Yii;
use yii\web\NotFoundHttpException;

class DefaultController extends Controller
{

    public function actionIndex()
    {
        
        
        if(Yii::$app->request->isPost){
            $msg=Yii::$app->request->post('bk');
            $book=Book::find()->where(['or',['like','book_name',$msg],['like','book_description',$msg],['like','content',$msg]])->all();
            return $this->render('index',[
                'book'=>$book,
                'msg'=>$msg,
            ]);
            
        }else{
            $msg ="";
            $book = Book::find()->all();
            return $this->render('index', [
                'book' => $book,
                'msg'=>$msg
            ]);
        }
        
//         $dataProvider = new ActiveDataProvider(['query' => Book::find()]);
//         return $this->render('index', [
//             'dataProvider' => $dataProvider
//         ]);
    }

    public function actionView($id)
    {
        /**
         * @var Book $model
         */
        $model = Book::findOne($id);
        if ($model == null) {
            throw new NotFoundHttpException('书不存在');
        }
        //$model->addView();
        return $this->render('view', [
            'model' => $model
        ]);
    }
    
    
    public function actionChapter($id)
    {
        /**
         * @var BookChapter $model
         */
        $model = BookChapter::findOne($id);
        if ($model == null) {
            throw new NotFoundHttpException('章节不存在');
        }
        $model->book->addView();
        return $this->render('chapter', [
            'model' => $model
        ]);
    }
}