<?php

use yii\helpers\Url;

?>
<!--  头部banner -->
<div class="banner am-g">
<img src="<?=$tou['image'] ?>">
</div>


<div class="example-box example-wrap">
<div class="am-container">

<h1 class="big-title">客户案例</h1>
<p>国内知名品牌企业都选择几何线商城的产品和服务</p>


<div class="exam-box-btn">
<button type="button" class="am-btn  am-btn-primary am-btn-lg "><a href="<?= Url::to('cases/index') ?>">全部</a></button>
<button type="button" class="am-btn  am-btn-primary am-btn-lg "><a href="<?= Url::to(['cases/index','category_id'=>2]) ?>">单商户</a></button>
<button type="button" class="am-btn  am-btn-primary am-btn-lg "><a href="<?= Url::to(['cases/index','category_id'=>3]) ?>">微商城</a></button>
<button type="button" class="am-btn  am-btn-primary am-btn-lg "><a href="<?= Url::to(['cases/index','category_id'=>1]) ?>">多商户</a></button>
<button type="button" class="am-btn  am-btn-primary am-btn-lg "><a href="<?= Url::to(['cases/index','category_id'=>4]) ?>">直销</a></button>
<button type="button" class="am-btn  am-btn-primary am-btn-lg "><a href="<?= Url::to(['cases/index','category_id'=>5]) ?>">小程序</a></button>
</div>

<div class="anli">

<ul class="anli-pc ">

<?= \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_item',
    'layout' => "{items}",
    
]) ?>
    
  </ul>
</div>
   <!-- 分页开始 -->
            <div class="page">
            
      <?php if (!(new \Detection\MobileDetect())->isMobile()): ?>
      <?= \yii\widgets\LinkPager::widget([
       'pagination' => $dataProvider->pagination
       ]); ?>
      <?php else:?>
      <?= \yii\widgets\LinkPager::widget([
        'pagination' => $dataProvider->pagination,
        'nextPageLabel' => '下一页',
        'prevPageLabel' => '上一页',
        'maxButtonCount' => 0,
        'prevPageCssClass' => 'previous',
        'nextPageCssClass' => 'next',
        'options' => ['class' => 'pager'],
      ]); ?>
      <?php endif;?>
            </div>


 	</div>
 </div>

 <?php
$this->registerJs(<<<JS
 
  //案例二维码显示
      $(".anli li").mouseover(function(){
        $(this).children(".code-img-box").show()
      })
      $(".anli li").mouseout(function(){
        $(this).children(".code-img-box").hide()
      })

    $('.am-thumbnail').mouseover(function(){
      $(this).children('.shadow').show();
    })
    $('.am-thumbnail').mouseout(function(){
      $(this).children('.shadow').hide();
    })

JS
);
?>