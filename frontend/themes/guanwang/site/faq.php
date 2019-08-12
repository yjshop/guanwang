<?php
use common\models\Page;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

?>
<!-- 主体 -->
<div class="faq-wrap">
    <div class="slide page-heading">
        <div class="container">
            <h3>我们致力于帮助客户解决市场需求的步伐从未停止过</h3>
        </div>
    </div>




<div class="am-container">
      <div class="row">
                <div class="faq-header">
                    <h4 class="faq-title">常见问题</h4>
                </div>
            </div>

 <div class="am-tabs" data-am-tabs>

    <ul class="am-tabs-nav am-nav am-nav-tabs">
    <?php foreach ($category as $k=>$cg):?>
    <li><a href="#tab<?=$n=($k+1) ?>"><?=Html::encode($cg->title) ?></a></li>
    <?php endforeach; ?>
    
<!--   am-activ -->
<!--     <li><a href="#tab3">单商户</a></li> -->
<!--     <li><a href="#tab4">多商户</a></li> -->
<!--      <li><a href="#tab5">三级分销</a></li> -->
  </ul>

 <div class="am-tabs-bd">
   
  <!-- 选项卡 -->
 <?php foreach ($category as $k=>$cg): ?>
    <div class="am-tab-panel am-fade am-in am-active" id="tab<?=$n=($k+1) ?>">
       <div id="web-mobile" class="slide services "> 
          <?php $help = Page::find()->where(['use_layout'=>1,'slug' =>'help','category_id'=>$cg['id']])->orderBy('id asc')->all(); ?>
            <div class="row">
               <?php foreach ($help as $mun): ?>
                <div class="faq-question"><?=Html::encode($mun->title) ?></div>
                <div class="faq-answer">
                    <img src="\storage\images\faq-answer.png">
                    <?= HtmlPurifier::process($mun->content) ?>
                </div>
                <?php endforeach; ?>
            </div>
        
      </div>
    </div>
 <?php endforeach; ?>
 </div>
 </div>
</div>
</div>





    <div id="web-mobile" class="slide services ">
    </div>

    </div>
    </div>
