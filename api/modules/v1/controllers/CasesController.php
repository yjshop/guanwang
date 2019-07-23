<?php
namespace api\modules\v1\controllers;
use yii;
use api\common\controllers\Controller;
use common\models\CasesSearch;
class CasesController extends Controller{
	public function actionIndex(){
		$data['status']=1;
       $p= new CasesSearch();
       $dataProvider=$p->search($data);
       return $dataProvider;

	}
}
?>