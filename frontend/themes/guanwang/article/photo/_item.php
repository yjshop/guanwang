<?php
use yii\helpers\Url;
?>
<li class="am-u-md-3 am-u-sm-4 ">
      <img src="<?=$model->cover?>">
      <div class="code-img-box " style="display: none;">
        <div>
         <a href="<?=Url::to(['article/view','id'=>$model->id])?>"> <img alt="客户案例：<?=$model->title?>" src="<?=$model->qr_code?>"></a>
          <p class="name "><a href="<?=Url::to(['article/view','id'=>$model->id])?>"><?=$model->title?></a></p>
          <p>微信扫码查看案例</p>
        </div>
      </div>
    </li>
