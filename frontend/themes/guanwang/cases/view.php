<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Article;
use common\models\Cases;
use yii\helpers\HtmlPurifier;
/* @var $this yii\web\View */
?>
 <!--  头部banner -->
<?php if(empty($tou)):?>

<?php else: ?>
<div class="banner am-g">
<img src="<?=$tou->image ?>">   
</div>
<?php endif; ?>


<!-- 案例介绍 -->
<div class="detail-box">
	<h1 class="big-title"><?=Html::encode($data->title)?></h1>
<div class="am-container">

<article class="am-article">

  <div class="am-article-bd">
<?=HtmlPurifier::process($data->content)?>
  </div>

</article>

</div>

</div>

<!-- 更多案例 -->
<div class="more-cases">
	<h1 class="big-title">更多案例</h1>
	<div class="am-container">
		<ul class="am-g">
		
		<?php foreach ($top2 as $vo):?>
			<li class="am-u-lg-3"><a href="<?=Url::to(['cases/view','id'=>$vo->id])?>"> <div class="am-thumbnail">
     		<div class="img-cover"> <img src="<?=$vo->cover?>" alt="<?=Html::encode($data->title)?>" /></div>
     			 <h3 class="am-thumbnail-caption"><?=Html::encode($vo->title)?></h3>
     			 <p></p>
    			</div>
    			</a>
			</li>
       <?php endforeach;?>

		</ul>
	</div>
</div>