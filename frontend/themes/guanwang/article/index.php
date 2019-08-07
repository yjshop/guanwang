<?php
use yii\helpers\Url;
use yii\helpers\Html;
use common\models\Category;
/* @var $this yii\web\View */
/* @var $models array */
/* @var $pages array */
/* @var $hotTags array */
/* @var $module string */
if(isset($category)) {
    $this->title = $category->title;
    list($this->title, $this->params['SEO_SITE_KEYWORDS'], $this->params['SEO_SITE_DESCRIPTION']) = $category->getMetaData();
} elseif (isset($tag)) {
    $this->title = $tag->name;
} else {
    $this->title = '文章';
}

?>
<div class="am-container news-list">
  <div class="am-u-md-9 am-u-sm-12">
      <!--  幻灯片开始-->
            <div class="am-slider am-slider-default" data-am-flexslider>
                <ul class="am-slides">
                    <li><img src="http://cn.bing.com/az/hprichv/LondonTrainStation_GettyRR_139321755_ZH-CN742316019.jpg" /></li>
                    <li><img src="http://s.cn.bing.net/az/hprichbg/rb/CardinalsBerries_ZH-CN10679090179_1366x768.jpg" /></li>
                </ul>
            </div>
            <!--   幻灯片结束 -->
            <div class="tab">
            <?php 
              $nav= Category::find()->orderBy('sort asc')->limit(8)->all();
             foreach ($nav as $key=> $item):
             ?>
                
                <a href="<?= Url::to(['/article/index', 'cate' => $item->slug]) ?>" <?php if(isset($category)&&($item->slug==$category->slug)):?> class="active"  <?php endif;?> ><?=$item->title?></a> 
            
             <?php endforeach;?>
            </div>

   <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item',
        'layout' => "{items}",
        'options' => ['class' => 'list-items bt-s'],
        'itemOptions' => ['class' => 'list-item']
    ])
   ?>
    
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
        <div class="am-u-md-3">
            <div class="detail-r">
                <div class="search">
                    <div class="am-input-group" style="width: 100%;">
                        <form action="" method="POST" style="display: table;width:100%;">
                            <input type="text" name="title" class="am-form-field" placeholder="请用关键词进行检索">
                            <input name="_csrf" type="hidden" value="<?=yii::$app->request->csrfToken?>">
                            <span class="am-input-group-btn">
                            <button class="am-btn am-btn-default" type="submit">
                            <span class="am-icon-search"></span>
                            </button>
                            </span>
                        </form>
                    </div>
                    <!-- <p class="des">搜索热词：<a href="">小程序</a><a href="">支付</a><a href="">授权</a><a href="">提现</a></p> -->
                </div>
                           
            
                  <div class="update">
                    <div class="hd">
                        <h2>推荐新闻</h2>
                    </div>
                    <div class="bd">
                        <ul>
                       <?php
                       $recommentList = \frontend\services\ArticleService::tops();
                       if (isset($category)){
                           $recommentList = \frontend\services\ArticleService::tops($category->id);
                       }  
                        foreach ($recommentList as $item):
                        ?>
                        <li><a href="<?= Url::to(['/article/detail', 'id' => $item->id]) ?>" title="<?= $item->title ?>" target="_blank"><?= $item->title ?></a></li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                 <div class="update">
                    <div class="hd">
                        <h2>成功案例</h2>
                    </div>
                    <div class="bd">
                        <ul>
                           
                            <li><a href="/article/detail/id/360.html">几何线小程序商城系统2018年最后一周开发更新日志</a></li>
                        </ul>
                    </div>
                </div>
                     <div class="update">
                    <div class="hd">
                        <h2>热门文章</h2>
                    </div>
                    <div class="bd">
                        <ul>
                         <?php
                             $hots = \frontend\services\ArticleService::hots(null,5);
                              if (isset($category)){
                           $hots = \frontend\services\ArticleService::tops($category->id);
                       }  
                            foreach ($hots as $item):
                            ?>
                            <?php if($item->cover):?>
                            <li>
                                <a href="<?= Url::to(['/article/detail', 'id' => $item->id]) ?>">
                                <div></div>
                                <p><?= $item->title ?></p>
                              </a>
                            </li>
                            <?php endif;?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                       <div class="tags">
                    <div class="hd">
                        <h2>热门标签</h2>
                    </div>
                    <div class="bd">
                        <ul>
                    
                <?php foreach($hotTags as $tag): ?>
                    <li><a class="label label-<?= $tag->level ?>" href="<?= \yii\helpers\Url::to(['article/tag', 'name' => $tag->name])?>"><?= $tag->name ?></a></li>
                <?php endforeach; ?>
          
                        </ul>
                    </div>
                </div>
            </div>
        </div>
  </div>

