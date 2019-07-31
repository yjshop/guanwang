<?php
/* @var $this yii\web\View */
/* @var $commentModel common\models\Comment */
/* @var $hots common\models\Article */
/* @var $model common\models\Article */
/* @var $next common\models\Article */
/* @var $prev common\models\Article */
/* @var $commentModels common\models\Comment */
/* @var $pages yii\data\Pagination */
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => $model->category, 'url' => ['/article/index', 'cate' => \common\models\Category::find()->where(['id' => $model->category_id])->select('slug')->scalar()]];
$this->params['breadcrumbs'][] = Html::encode($model->title);
list($this->title, $this->params['seo_site_keywords'], $this->params['seo_site_description']) = $model->getMetaData();
?>

<div class="detail-wrap">
    <div class="banner am-g"> 
</div> 
 </div>
<!-- 案例介绍 -->
<div class="detail-box">
	<h1 class="big-title"><?= $model['title'] ?></h1>
<div class="am-container">

	<article class="am-article">
  <div class="am-article-bd">

  </div>



</article>



</div>

</div>


<!-- 更多案例 -->
<div class="more-cases">
	<h1 class="big-title">更多案例</h1>
	<div class="am-container">
		<ul class="am-g">
			<li class="am-u-lg-3"><a href=""> <div class="am-thumbnail">
     		<div class="img-cover"> <img src="http://www.bing.com/az/hprichbg/rb/AdelaideFrog_EN-US12171255358_1366x768.jpg" alt=""/></div>
     			 <h3 class="am-thumbnail-caption">图片标题 #2</h3>
     			 <p>...</p>
    			</div>
    			</a>
			</li>

			<li class="am-u-lg-3"><a href=""> <div class="am-thumbnail">
     		<div class="img-cover"> <img src="http://www.bing.com/az/hprichbg/rb/AdelaideFrog_EN-US12171255358_1366x768.jpg" alt=""/></div>
     			 <h3 class="am-thumbnail-caption">图片标题 #2</h3>
     			 <p>...</p>
    			</div>
    			</a>
			</li>

			<li class="am-u-lg-3"><a href=""> <div class="am-thumbnail">
     		<div class="img-cover"> <img src="http://www.bing.com/az/hprichbg/rb/AdelaideFrog_EN-US12171255358_1366x768.jpg" alt=""/></div>
     			 <h3 class="am-thumbnail-caption">图片标题 #2</h3>
     			 <p>...</p>
    			</div>
    			</a>
			</li>

			<li class="am-u-lg-3"><a href=""> <div class="am-thumbnail">
     		<div class="img-cover"> <img src="http://www.bing.com/az/hprichbg/rb/AdelaideFrog_EN-US12171255358_1366x768.jpg" alt=""/></div>
     			 <h3 class="am-thumbnail-caption">图片标题 #2</h3>
     			 <p>...</p>
    			</div>
    			</a>
			</li>


		</ul>
	</div>
</div>

<?php $this->registerJs("$('.view-content a').attr('target', '_blank');") ?>
<?php $this->registerCssFile('http://cdn.bootcss.com/photoswipe/3.0.5/photoswipe.min.css') ?>
<?php $this->registerJsFile('http://cdn.bootcss.com/photoswipe/3.0.5/klass.min.js', ['depends' => ['yii\web\JqueryAsset']]) ?>
<?php $this->registerJsFile('http://cdn.bootcss.com/photoswipe/3.0.5/code.photoswipe.min.js', ['depends' => ['yii\web\JqueryAsset']]) ?>

<?php $this->beginBlock('js') ?>
<script>
    $(document).ready(function(){
        $(".photo-item a").photoSwipe();
    });
</script>
<?php $this->endBlock('js') ?>
