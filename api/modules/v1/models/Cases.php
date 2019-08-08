<?php


namespace api\modules\v1\models;

use yii\helpers\ArrayHelper;

class Cases extends   \common\models\Cases

{
    public function fields()
    {
        return ArrayHelper::merge(parent::fields(), [

                'cover' => function ($model) {
                return ArrayHelper::getValue($model, 'cover.url', '');
                },
                'qr_cover' => function ($model) {
                return ArrayHelper::getValue($model, 'qr_cover.url', '');
                }
            
                ]);
    }
    

   
}