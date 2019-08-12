<?php
use yii\helpers\Url;
use common\models\Article;
use common\models\Cases;
use kartik\helpers\Html;
use yii\helpers\HtmlPurifier;
/* @var $this yii\web\View */
?> 
<!--  头部banner -->
<?php if(empty($tou)):?>
<!-- 不显示 -->
<?php else: ?>
<div class="banner am-g">
<img src="<?=$tou->image ?>">   
</div>
<?php endif; ?>

<!-- 案例介绍 -->
<div class="detail-box">
	<h1 class="big-title"><?=\yii\helpers\Html::encode($data->title);?></h1>
<div class="am-container">

<article class="am-article">

  <div class="am-article-bd">
  <?= HtmlPurifier::process($data['content']);?>
  </div>

</article>

</div>

</div>

<!-- 更多案例 -->
<div class="more-cases">
	<h1 class="big-title">更多案例</h1>
	
	<div class="am-container">
		<div class="case-list am-u-sm-12">
		    <div data-am-widget="slider" class="am-slider am-slider-b3" data-am-slider='{&quot;controlNav&quot;:false}'>
		<ul class="am-slides">
		
		<?php foreach ($top2 as $vo):?>
			<li> <a href="<?=Url::to(['cases/view','id'=>$vo->id])?>"> 
     		 <img src="<?=$vo->cover?>" alt="<?=\yii\helpers\Html::encode($vo->title)?>"/>

     		    <div class="am-slider-desc"><?=\yii\helpers\Html::encode($vo->title)?></div>
   			
    			</a>
			</li>
       <?php endforeach;?>

		</ul>
	</div>
	</div>
</div>
</div>