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

  <!-- /头部 -->
    <!-- 主体 -->
    <div class="am-container news-detail">
      
        <div class="am-u-md-9">

            <div class="detail-tit">
                <h1><?= Html::encode($model->title) ?></h1>
                <p> <span class="time"><a href="<?= Url::to(['/user/default/index', 'id' => $model->user_id]) ?>"><?= Html::icon('user')?> <?= $model->user->username?></a> </span>
                    <span class="time"><?= Html::icon('clock-o')?> <?= date('Y-m-d', $model->created_at) ?></span><span class="time">来源：</span></span><span class="time"> <?= Html::icon('eye')?> <?= $model->trueView?>次浏览</span>
                  <!--     <span class="comments"><a href="#comments"><?= Html::icon('comments-o')?> <?= $model->commentTotal ?>条评论</a></span> -->
                    <span class="favourites"><?= Html::a(Html::icon($model->isFavourite ? 'star' : 'star-o') . ' <em>' . $model->favourite . '</em>', ['/favourite'], [
                            'data-params' => [
                                'id' => $model->id
                            ],
                            'data-toggle' => 'tooltip',
                            'data-original-title' => '收藏'
                        ])?>
            </span>
                </p>

            </div>
     
            <p class="view-description">   <?= $model->description ?></p>
            <div class="content">
               <?= \yii\helpers\HtmlPurifier::process($model->data->processedContent) ?>
            
            </div>
            <div class="content">
                <div class="news-tag">
                  <span>相关标签：</span>
                  <ul class="tag-list">
                  <?php foreach ($model->tags as $key=> $tag):?>
                    <li><a class="tag tag-<?= $key ?>" href="<?= \yii\helpers\Url::to(['article/tag', 'name' => $tag->name])?>"><?=$tag->name?></a></li>
                  <?php endforeach;?>
                 </ul>
                 <div class="clear"></div>
                </div>   
            </div>
            <div class="news-page clearfloat">
            
                 <?php if ($prev != null): ?>
                            <a href="<?= Url::to(['detail', 'id' => $prev->id]) ?>"><span class="iconfont icon-zuojiantou"></span><span>上一篇</span></a>
                        <?php else: ?>
                            <a href="javascript:;"><span class="iconfont icon-zuojiantou"></span><span>已经是第一篇</span> </a>
                        <?php endif; ?>
                        <a href="<?=Url::to(['/article/index', 'cate' => \common\models\Category::find()->where(['id' => $model->category_id])->select('slug')->scalar()])?>"><span class="iconfont icon-liebiao"></span><span>返回列表</span></a>
                        <?php if ($next != null): ?>
                            <a href="<?= Url::to(['detail', 'id' => $next->id]) ?>"><span>下一篇</span><span class="iconfont icon-zuojiantou1"></span></a>
                        <?php else: ?>
                          <a href="javascript:;"><span>没有了 </span><span class="iconfont icon-zuojiantou1"></span></a>
                        <?php endif; ?>
            </div>
           <!--  分享 -->
             <?= \common\widgets\share\Share::widget()?>
              <!-- 评论   -->
     
        </div>
        <div class="am-u-md-3">
            <div class="detail-r">
                <div class="search">
                    <div class="am-input-group" style="width: 100%;">
                        <form action="<?=Url::to(['article/index'])?>" method="POST" style="display: table;width:100%;">
                            <input type="text" name="title" class="am-form-field" placeholder="请用关键词进行检索">
                            <input name="_csrf" type="hidden" value="<?=yii::$app->request->csrfToken?>">
                            <span class="am-input-group-btn">
                            <button class="am-btn am-btn-default" type="submit"><span class="am-icon-search"></span>
                            </button>
                            </span>                      
                         </form>
                    </div>
               <!-- <p class="des">搜索热词：<a href="">小程序</a><a href="">支付</a><a href="">授权</a><a href="">提现</a></p>  -->   
             </div>
              
                <div class="update">
                    <div class="hd">
                        <h2>热门新闻</h2>
                    </div>
                    <div class="bd">
                        <ul>
                      <?php foreach ($hots as $item):?>
                        <li><?= Html::a($item->title, ['/article/detail', 'id' => $item->id])?></li>
                    <?php endforeach;?>
                           
                        </ul>
                    </div>
                </div>
                <div class="update">
                    <div class="hd">
                        <h2>经典案例</h2>
                    </div>
                    <div class="bd">
                        <ul>
                        <?php foreach ($case as $i): ?>
                            <li><a href="<?=Url::to(['article/detail','id'=>$i->id]) ?>"><?= Html::encode($i->title) ?></a></li>
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
                           <?php
                            $hotTags =\frontend\services\TagService::hot();
                            foreach($hotTags as $key=> $tag): ?>
                          
                             <li><a class="tag tag-3" href="<?= \yii\helpers\Url::to(['article/tag', 'name' => $tag->name])?>"><?= $tag->name ?></a></li>
                                 
                        <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /主体 -->
<?php $this->registerJs("$('.view-content a').attr('target', '_blank');") ?>