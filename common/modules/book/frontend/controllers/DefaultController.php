<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 2016/12/15
 * Time: 下午2:05
 */

namespace common\modules\book\frontend\controllers;
use yii\data\Pagination;

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
            $book=Book::find()->where(['or',['like','book_name',$msg],['like','book_description',$msg],['like','content',$msg]])->orderBy('id desc');
            
            $pagination = new Pagination([
                'defaultPageSize' => 5,
                'totalCount' => $book->count(),
            ]);
            
            $books = $book
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
            
            return $this->render('index',[
                'books'=>$books,
                'msg'=>$msg,
                'pagination'=>$pagination,
            ]);
            
        }else{
            
            $msg ="";
            $book = Book::find();//->orderBy('id desc')->all();
            
            $pagination = new Pagination([
                'defaultPageSize' => 5,
                'totalCount' => $book->count(),
            ]);
            
            $books = $book->orderBy('id desc')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
            
            return $this->render('index', [
                'books' => $books,
                'msg'=>$msg,
               'pagination'=>$pagination,
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
        $msg ="";
        $model = Book::findOne($id);
        if ($model == null) {
            throw new NotFoundHttpException('书不存在');
        }
        //$model->addView();
        return $this->render('view', [
            'model' => $model,
            'msg'=>$msg,
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