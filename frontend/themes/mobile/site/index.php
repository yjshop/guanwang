<?php
use yii\helpers\Url;
use common\models\Article;
/* @var $this yii\web\View */
echo "
<style type = 'text/css'>
.solution-methods .am-thumbnail{
background-image: url(storage/images/system1.png);
}
</style>
";
?>

<!-- 主体 -->
   <!--  轮播图 -->
    <div class="banner am-g">
    <div class="swiper-container swiper1">
    <div class="swiper-wrapper">
      <div class="swiper-slide"><img src="<?= $carouselitem[0]['image'] ?>"></div>
      <div class="swiper-slide"><img src="<?= $carouselitem[1]['image'] ?>"></div>
      <div class="swiper-slide"><img src="<?= $carouselitem[2]['image'] ?>"></div>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
  </div>
   
</div>




<!-- 解决方案 -->
<div class="solution-methods am-hide-sm-only">
  <div class="am-container">
    <h1 class="big-title">解决方案</h1>
      <div class="line"></div>
       

<div class="am-g">
<div class="am-u-lg-4">

    <div class="am-thumbnail">
   
      <div class="am-thumbnail-caption">
        <h3>微商城</h3>
        <p>无缝接入微信，对接微信登录及支付功能</p>
       
      </div>

       <div class="shadow">
         <h2>duo</h2>
         <p>快速打造您自己的入驻大型平台，深度支持同城资讯、城市生活、酒店出行、商圈、商场等多种业态，抢占流量先机</p>
         <a href="">了解详情</a>

       </div>
    </div>
  </div>


<div class="am-u-lg-4">
    <div class="am-thumbnail">
     
      <div class="am-thumbnail-caption">
        <h3>微商城</h3>
        <p>无缝接入微信，对接微信登录及支付功能</p>
       
      </div>
       <div class="shadow">
         <h2>微商城</h2>
         <p>快速打造您自己的入驻大型平台，深度支持同城资讯、城市生活、酒店出行、商圈、商场等多种业态，抢占流量先机</p>

         <!-- <button type="button" class="am-btn am-btn-default">了解详情</button> -->
         <a href="">了解详情</a>

       </div>
    </div>
  </div>
  <div class="am-u-lg-4">
    <div class="am-thumbnail">
     
      <div class="am-thumbnail-caption">
        <h3>微商城</h3>
        <p>无缝接入微信，对接微信登录及支付功能</p>
       
      </div>
       <div class="shadow">
         <h2>微商城</h2>
         <p>快速打造您自己的入驻大型平台，深度支持同城资讯、城市生活、酒店出行、商圈、商场等多种业态，抢占流量先机</p>

         <!-- <button type="button" class="am-btn am-btn-default">了解详情</button> -->
         <a href="">了解详情</a>

       </div>
    </div>
  </div>

</div>

<div class="am-g">
<div class="am-u-lg-4">
    <div class="am-thumbnail">
     
      <div class="am-thumbnail-caption">
        <h3>微商城</h3>
        <p>无缝接入微信，对接微信登录及支付功能</p>
       
      </div>
         <div class="shadow">
         <h2>duo</h2>
         <p>快速打造您自己的入驻大型平台，深度支持同城资讯、城市生活、酒店出行、商圈、商场等多种业态，抢占流量先机</p>
         <a href="">了解详情</a>

       </div>
    </div>
  </div>
<div class="am-u-lg-4">
    <div class="am-thumbnail">
     
      <div class="am-thumbnail-caption">
        <h3>微商城</h3>
        <p>无缝接入微信，对接微信登录及支付功能</p>
       
      </div>
         <div class="shadow">
         <h2>duo</h2>
         <p>快速打造您自己的入驻大型平台，深度支持同城资讯、城市生活、酒店出行、商圈、商场等多种业态，抢占流量先机</p>
         <a href="">了解详情</a>

       </div>
    </div>
  </div>
<div class="am-u-lg-4">
    <div class="am-thumbnail">
     
      <div class="am-thumbnail-caption">
        <h3>微商城</h3>
        <p>无缝接入微信，对接微信登录及支付功能</p>
       
      </div>
         <div class="shadow">
         <h2>duo</h2>
         <p>快速打造您自己的入驻大型平台，深度支持同城资讯、城市生活、酒店出行、商圈、商场等多种业态，抢占流量先机</p>
         <a href="">了解详情</a>

       </div>
    </div>
  </div>

</div>

  </div>
</div>



<!-- 适用行业 -->

<!-- 优势 -->
    <div class="bg-two-components">
        <div class="xcx-goodness bg-fff">
            <h1 class="big-title">功能优势</h1>
            <div class="line"></div>
            <div class="am-container">
                <ul class="am-g">
                              <li class="am-u-md-3 am-u-sm-3">
                        <div class="xcx-goodness-box">
                            <div class="tc icon-img"><img src="<?php echo Url::to('@web/storage/images/coupon.png'); ?>"></div>
                            <div>
                                <h3>优惠券</h3>
                                <p>含折多种优惠方式,下单直接抵扣,价格超实惠</p>
                            </div>
                        </div>
                    </li>
                     <li class="am-u-md-3 am-u-sm-3">
                        <div class="xcx-goodness-box">
                            <div class="tc icon-img"><img src="<?php echo Url::to('@web/storage/images/miaosha.png'); ?>"></div>
              <div>
                <h3>限时秒杀</h3>
                <p>多种营销玩法，提升流量和销量</p>
              </div>

            </div>
          </li>
          <li class="am-u-md-3 am-u-sm-3">
            <div class="xcx-goodness-box ">
              <div class="tc icon-img "><img src="<?php echo Url::to('@web/storage/images/fenxiao.png'); ?>"></div>
                            <div>
                                <h3>三级分销</h3>
                                <p>以客推客，打造自己的微分销商城</p>
                            </div>
                        </div>
                    </li>
                    <li class="am-u-md-3 am-u-sm-3">
                        <div class="xcx-goodness-box">
                            <div class="tc icon-img"><img src="<?php echo Url::to('@web/storage/images/huoche.png'); ?>"></div>
              <div>
                <h3>物流追踪</h3>
                <p>可在地图上追踪物流信息</p>
              </div>
            </div>
          </li>
           <li class="am-u-md-3 am-u-sm-3">
            <div class="xcx-goodness-box ">
              <div class="tc icon-img "><img src="<?php echo Url::to('@web/storage/images/hongbao.png'); ?>"></div>
                            <div>
                                <h3>红包</h3>
                                <p>多种红包现金信息，包括微信红包、qq红包、现金红包等</p>
                            </div>
                        </div>
                    </li>
                    <li class="am-u-md-3 am-u-sm-3">
                        <div class="xcx-goodness-box">
                            <div class="tc icon-img"><img src="<?php echo Url::to('@web/storage/images/chongzhi.png'); ?>"></div>
              <div>
                <h3>充值/提现</h3>
                <p>线上一键充值/提现，方便快捷</p>
              </div>

            </div>
          </li>
           <li class="am-u-md-3 am-u-sm-3">
            <div class="xcx-goodness-box ">
              <div class="tc icon-img "><img src="<?php echo Url::to('@web/storage/images/zhifu.png'); ?>"></div>
                            <div>
                                <h3>多种支付方式</h3>
                                <p>支持微信、支付宝等多种支付方式，灵活快捷</p>
                            </div>
                        </div>
                    </li>
                    <li class="am-u-md-3 am-u-sm-3">
                        <div class="xcx-goodness-box">
                            <div class="tc icon-img"><img src="<?php echo Url::to('@web/storage/images/fenxiang.png'); ?>"></div>
              <div>
                <h3>一键分享</h3>
                <p>好友和群成员，通过你的分享，发现你的小程序</p>
              </div>
            </div>
          </li>
              <li class="am-u-md-3 am-u-sm-3">
            <div class="xcx-goodness-box ">
              <div class="tc icon-img " ><img src="<?php echo Url::to('@web/storage/images/anquan.png'); ?>"></div>
                            <div>
                                <h3>安全/稳定</h3>
                                <p>国际认证安全管理</p>
                            </div>
                        </div>
                    </li>
                       <li class="am-u-md-3 am-u-sm-3">
            <div class="xcx-goodness-box ">
              <div class="tc icon-img " ><img src="<?php echo Url::to('@web/storage/images/jifen.png'); ?>"></div>
                            <div>
                                <h3>积分</h3>
                                <p>推广小程序，只需要用户扫码即可,减少了用户的耐心损耗</p>
                            </div>
                        </div>
                    </li>
                         <li class="am-u-md-3 am-u-sm-3">
            <div class="xcx-goodness-box ">
              <div class="tc icon-img "><img src="<?php echo Url::to('@web/storage/images/kefu.png'); ?>"></div>
                            <div>
                                <h3>即时客服</h3>
                                <p>提供即通讯能力，如单聊、群聊、发语音、发图片、等</p>
                            </div>
                        </div>
                    </li>

                        <li class="am-u-md-3 am-u-sm-3">
            <div class="xcx-goodness-box ">
              <div class="tc icon-img " ><img src="<?php echo Url::to('@web/storage/images/yun.png'); ?>"></div>
                            <div>
                                <h3>云通信</h3>
                                <p>自动发送营销短信、验证码</p>
                            </div>
                        </div>
                    </li>


          

             
          


        </ul>
    </div>
  </div>


<!--  适用行业 -->
  <div class="bg-two ">
    <div class="solutions am-container ">
      <h1 class="big-title ">适用行业</h1>
      <div class="line "></div>
      <div>
        <ul>
          <li class="am-u-md-3 am-u-sm-6 "><img alt="生鲜行业小程序商城解决方案 " src="<?php echo Url::to('@web/storage/images/shengxian.png')?>"><p>生鲜</p></li>
          <li class="am-u-md-3 am-u-sm-6 "><img alt="餐饮行业小程序商城解决方案 " src="<?php echo Url::to('@web/storage/images/canyin.png')?>"><p>餐饮</p></li>
          <li class="am-u-md-3 am-u-sm-6 "><img alt="婚庆行业小程序商城解决方案 " src="<?php echo Url::to('@web/storage/images/hunqing.png')?>"><p>婚庆</p></li>
          <li class="am-u-md-3 am-u-sm-6 "><img alt="美业行业小程序商城解决方案 " src="<?php echo Url::to('@web/storage/images/meiye.png')?>"><p>美业</p></li>
          <li class="am-u-md-3 am-u-sm-6 "><img alt="酒店行业小程序商城解决方案 " src="<?php echo Url::to('@web/storage/images/jiudian.png')?>"><p>酒店</p></li>
          <li class="am-u-md-3 am-u-sm-6 "><img alt="家居行业小程序商城解决方案 " src="<?php echo Url::to('@web/storage/images/jiaju.jpg')?>"><p>家居</p></li>
          <li class="am-u-md-3 am-u-sm-6 "><img alt="服饰行业小程序商城解决方案 " src="<?php echo Url::to('@web/storage/images/fushi.png')?>"><p>服饰</p></li>
          <li class="am-u-md-3 am-u-sm-6 "><img alt="母婴行业小程序商城解决方案 " src=".<?php echo Url::to('@web/storage/images/muying.png')?>"><p>母婴</p></li>
        </ul>
      </div>
    </div> 
  </div>
</div>

<!-- 成功案例 -->
 <div class="anli am-container index-anli-bg" style ="background-image: url('<?php echo Url::to('@web/storage/images/anlia.png') ?>');">
  <h1 class="big-title ">成功案例</h1>
  <div class="line "></div>
  <div class="anli-phone ">
    
   <div class="swiper-container swiper2">
    <div class="swiper-wrapper">
     <?php foreach ($case as $vv): ?>
      <div class="swiper-slide"><img src="<?=$vv['cover']?>">
          <a href="<?=Url::to(['cases/view','id'=>$vv['id']])?>"><?=$vv['title']?></a>      
      </div>
      <?php endforeach; ?>
    </div>
  </div>
<div class="m-more"><a href="<?=Url::to(['cases/index'])?>">更多案例>></a></div>
  </div>

</div> 


<!-- 优势 -->
<div class="advantage am-hide-sm-only">
  <div class="am-container ">
    <div class="adv-title ">我们一直在不断发展中</div>
    <div class="adv-title-bor "></div>
    <div class="am-g ">
      <div class="am-u-md-4 am-u-sm-4 col ">
        <div class="circle ">32+</div>
        <h4>覆盖省份</h4>
      </div>
      <div class="am-u-md-4 am-u-sm-4 col ">
        <div class="circle col-blue ">960+</div>
        <h4>下载量</h4>
      </div>
      <div class="am-u-md-4 am-u-sm-4 col ">
        <div class="circle col-red ">10</div>
        <h4>更新次数</h4>
      </div>
    </div>
  </div>
</div>



<!-- 资讯 -->

<!-- 资讯中心 -->
<div class="news ">
  <h1 class="big-title ">资讯中心</h1>
  <div class="line "></div>
  <div class="am-container ">
  <?php foreach ($phone as $key => $value): ?>
    <div class="am-u-md-4 am-u-sm-12 ">
      <div class="box-top ">
        <h3><?=$value['title']?></h3>
      </div>
      
      <?php $article = Article::find()->published()->where(['category_id'=>$value['id'],'status'=>1])->orderBy('id desc')->limit(5)->all();?>
      <?php if($key<1&&!empty($article)):?>
      <div class="news-box1 ">
         <a class="update " href="<?=Url::to(['article/detail','id'=>$article[0]['id']])?>">
          <div class="img-box ">
             <img src="/storage/images/news01.jpg" alt="资讯图片">
          </div>
          <h4><?= $article[0]['title'] ?></h4>
          <p><?= $article[0]['title'] ?></p>
        </a>
     </div>
     <?php else:?>
      
       
        <div class="news-box2">
           <?php foreach ($article as $kk=>$vo):?>
           <ul>
             <li class="news-des "> <a href="<?=Url::to(['article/detail','id'=>$vo['id']])?>"><?=$vo['title']?>"</a></li>
           </ul>
           <?php endforeach;?>      
           
           
           
        </div>  
     <?php endif;?>
     
     <div class="box-footer ">
              <a href="<?=Url::to(['article/index','cate'=>$value['slug']])?>">更多&gt;&gt;</a>
     </div>

   </div>
  <?php endforeach; ?>      
    </div>    
  </div>
</div>


<?php
$this->registerJs(<<<JS

      // 轮播图

    var swiper1 = new Swiper('.swiper1', {
      pagination: {
        el: '.swiper-pagination',
      },
    });



  

  //案例轮播图
       var swiper2 = new Swiper('.swiper2', {
        roundLengths:true, 
        initialSlide:1,
        centeredSlides : true,
        speed:600,
      slidesPerView: "auto",
      autoplay: 3000,
      loop:true,
      followFinger:false
     
    });




JS
);
?>