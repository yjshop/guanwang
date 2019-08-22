<?php
use yii\helpers\Html;
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
    <div class="banner am-g">
  
    <div class="swiper-container">
    <div class="swiper-wrapper">
  
    <?php foreach ($image as $img): ?>
    <div class="swiper-slide"><img src="<?= $img->image ?>"></div>
    <?php endforeach;?>

      <!-- <div class="swiper-pagination"></div> -->
    </div>

       <div class="banner-footer">
        <div class="am-container">
        <div class="am-g">
      <!--     <div class="am-u-lg-4 footer-style"><a href=""><h3>新零售线下商城系统</h3>
        <p>线下门店拓客神器</p>

          </a></div>
          <div class="am-u-lg-4 footer-style"><a href=""><h3>云商城系统</h3>
            <p>打造专属"SAAS云商城"</p></a></div>
          <div class="am-u-lg-4 footer-style"><a href=""><h3>多端融合</h3>
            <p>一键搭建H5+微信公众号+小程序商城</p></a></div>
        </div> -->
      </div>
    </div>
    </div>
</div>


<!-- 解决方案 -->

<!-- <div class="solution-methods">
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
</div> -->

 <!-- 优势 -->
    <div class="bg-two-components">
        <div class="xcx-goodness bg-fff">
            <h1 class="big-title">功能优势</h1>
            <div class="line"></div>
            <div class="am-container">
                <ul class="am-g">
                    <li class="am-u-md-3">
                        <div class="xcx-goodness-box">
                            <div class="tc icon1-img icon-img "><img src="<?php echo Url::to('@web/storage/images/coupon.png'); ?>"></div>
                            <div>
                                <h3>优惠券</h3>
                                <p>含折多种优惠方式,下单直接抵扣,营销好帮手</p>
                            </div>
                        </div>
                    </li>
                    <li class="am-u-md-3">
                        <div class="xcx-goodness-box">
                            <div class="tc icon1-img icon-img"><img src="<?php echo Url::to('@web/storage/images/miaosha.png'); ?>"></div>
              <div>
                <h3>限时秒杀</h3>
                <p>给用户带来秒杀购物体验，提升流量和销量</p>
              </div>

            </div>
          </li>
          <li class="am-u-md-3 ">
            <div class="xcx-goodness-box ">
              <div class="tc icon1-img icon-img "><img src="<?php echo Url::to('@web/storage/images/fenxiao.png'); ?>"></div>
                            <div>
                                <h3>三级分销</h3>
                                <p>以客推客，打造自己的微分销商城</p>
                            </div>
                        </div>
                    </li>
                    <li class="am-u-md-3">
                        <div class="xcx-goodness-box">
                            <div class="tc icon1-img icon-img"><img src="<?php echo Url::to('@web/storage/images/shipping.png'); ?>"></div>
              <div>
                <h3>物流追踪</h3>
                <p>可在地图上追踪物流信息</p>
              </div>
            </div>
          </li>
          <li class="am-u-md-3 ">
            <div class="xcx-goodness-box ">
              <div class="tc icon1-img icon-img "><img src="<?php echo Url::to('@web/storage/images/red.png'); ?>"></div>
                            <div>
                                <h3>红包</h3>
                                <p>包含有新人红包、站内分享红包，帮助您吸引流量</p>
                            </div>
                        </div>
                    </li>
                    <li class="am-u-md-3">
                        <div class="xcx-goodness-box">
                            <div class="tc icon1-img icon-img"><img src="<?php echo Url::to('@web/storage/images/recharge.png');?>"></div>
              <div>
                <h3>充值/提现</h3>
                <p>线上一键充值/提现，方便快捷</p>
              </div>

            </div>
          </li>
          <li class="am-u-md-3 ">
            <div class="xcx-goodness-box ">
              <div class="tc icon1-img icon-img "><img src="<?php echo Url::to('@web/storage/images/pay.png'); ?>"></div>
                            <div>
                                <h3>多种支付方式</h3>
                                <p>支持微信、支付宝、余额等多种支付方式，灵活快捷</p>
                            </div>
                        </div>
                    </li>
                    <li class="am-u-md-3">
                        <div class="xcx-goodness-box">
                            <div class="tc icon1-img icon-img"><img src="<?php echo Url::to('@web/storage/images/share.png'); ?>"></div>
              <div>
                <h3>一键分享</h3>
                <p>一键将程序分享到微信朋友圈、好友、群聊，流量来得就是这么简单</p>
              </div>
            </div>
          </li>
               <li class="am-u-md-3 ">
            <div class="xcx-goodness-box ">
              <div class="tc icon1-img icon-img " ><img src="<?php echo Url::to('@web/storage/images/safe.png'); ?>"></div>
                            <div>
                                <h3>安全/稳定</h3>
                                <p>5年以上开发经验、严格测试、大量用户的实践</p>
                            </div>
                        </div>
                    </li>
                         <li class="am-u-md-3 ">
            <div class="xcx-goodness-box ">
              <div class="tc icon1-img icon-img " ><img src="<?php echo Url::to('@web/storage/images/jifen.png'); ?>"></div>
                            <div>
                                <h3>积分</h3>
                                <p>购物获得积分，积分可进行抵扣，促进用户消费欲望</p>
                            </div>
                        </div>
                    </li>
                         <li class="am-u-md-3 ">
            <div class="xcx-goodness-box ">
              <div class="tc icon1-img icon-img "><img src="<?php echo Url::to('@web/storage/images/kefu.png'); ?>"></div>
                            <div>
                                <h3>即时客服</h3>
                                <p>提供即通讯能力，如单聊、群聊、发语音、发图片、等</p>
                            </div>
                        </div>
                    </li>

                         <li class="am-u-md-3 ">
            <div class="xcx-goodness-box ">
              <div class="tc icon1-img icon-img " ><img src="<?php echo Url::to('@web/storage/images/cloud.png'); ?>"></div>
                            <div>
                                <h3>云通信</h3>
                                <p>自动发送营销短信、验证码短信</p>
                            </div>
                        </div>
                    </li>

        </ul>
    </div>
  </div>
  <div class="bg-two ">
    <div class="solutions am-container ">
      <h1 class="big-title ">适用行业</h1>
      <div class="line "></div>
      <div>
        <ul>
          <li class="am-u-md-3 am-u-sm-4 "><img alt="生鲜行业小程序商城解决方案 " src="<?php echo Url::to('@web/storage/images/shengxian.png');?>"><p>生鲜</p></li>
          <li class="am-u-md-3 am-u-sm-4 "><img alt="餐饮行业小程序商城解决方案 " src="<?php echo Url::to('@web/storage/images/canyin.png'); ?>"><p>餐饮</p></li>
          <li class="am-u-md-3 am-u-sm-4 "><img alt="婚庆行业小程序商城解决方案 " src="<?php echo Url::to('@web/storage/images/hunqing.png'); ?>"><p>婚庆</p></li>
          <li class="am-u-md-3 am-u-sm-4 "><img alt="美业行业小程序商城解决方案 " src="<?php echo Url::to('@web/storage/images/meiye.png'); ?>"><p>美业</p></li>
          <li class="am-u-md-3 am-u-sm-4 "><img alt="酒店行业小程序商城解决方案 " src="<?php echo Url::to('@web/storage/images/jiudian.png'); ?>"><p>酒店</p></li>
          <li class="am-u-md-3 am-u-sm-4 "><img alt="家居行业小程序商城解决方案 " src="<?php echo Url::to('@web/storage/images/jiaju.jpg'); ?>"><p>家居</p></li>
          <li class="am-u-md-3 am-u-sm-4 "><img alt="服饰行业小程序商城解决方案 " src="<?php echo Url::to('@web/storage/images/fushi.png'); ?>"><p>服饰</p></li>
          <li class="am-u-md-3 am-u-sm-4 "><img alt="母婴行业小程序商城解决方案 " src="<?php echo Url::to('@web/storage/images/muying.png'); ?>"><p>母婴</p></li>
        </ul>
      </div>
    </div> 
  </div>
</div>

 <div class="anli am-container ">
  <h1 class="big-title ">成功案例</h1>
  <div class="line "></div>
  <ul class="anli-pc">
  <?php foreach ($case as $vv): ?> 
    <li class="am-u-md-3 am-u-sm-4 ">
      <a href="<?=Url::to(['cases/view','id'=>$vv['id']])?>"> <img alt="<?=Html::encode($vv->title) ?>" src="<?=$vv->cover?>"></a>
      <div class="code-img-box ">
        <div>
          <a href="<?=Url::to(['cases/view','id'=>$vv['id']])?>"><img alt="<?=Html::encode($vv->title) ?>" src="<?= $vv->qr_cover ?>"></a>
          <p class="name"><a href="<?=Url::to(['cases/view','id'=>$vv['id']])?>"><?=Html::encode($vv->title) ?></a></p>
          <p>微信扫码查看案例</p>
        </div>
      </div>
    </li>
 <?php endforeach; ?>    	
  </ul>
  
  <ul class="anli-phone ">
       <li class="am-u-md-4 am-u-sm-4 ">
      <img src="">
      <p>几何线</p>
     </li>
  </ul>
  <div class="more"><a href=""><a type="button" href="<?=Url::to(['cases/index'])?>" class="am-btn am-btn-primary">了解更多>></a></a></div>
</div> 


<div class="advantage ">
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

<!-- 资讯中心 -->
<div class="news ">
  <h1 class="big-title ">资讯中心</h1>
  <div class="line "></div>
  <div class="am-container ">
          
     <?php foreach ($categories as $key => $value): ?>

      <div class="am-u-md-4 am-u-sm-12 ">
      <div class="box-top ">
        <h3><?=$value['title']?>
            <a href="<?=Url::to(['article/index','cate'=>$value['slug']])?>">更多&gt;&gt;</a> 
        </h3>
        
      </div>
      <?php $article = Article::find()->published()->where(['category_id'=>$value['id'],'status'=>1])->orderBy('id desc')->limit(5)->all();?>

         <?php if($key<3&&!empty($article)):?>
         	
        <div class="news-box1">
               <a class="update " href="<?=Url::to(['article/detail','id'=>$article[0]->id])?>">
               <div class="img-box ">
                   <img src="<?php echo Url::to('@web/storage/images/news01.jpg'); ?>" alt="<?=Html::encode($article[0]->title) ?> ">
               </div>
			   <h4> <?=Html::encode($article[0]->title) ?></h4>
               <p class="desc"><?=Html::encode($article[0]->title) ?></p>
               </a>
         <?php else:?>
          <div class="news-box2">   
          <!--列表-->
         <?php foreach ($article as $kk=>$vo):?>
          <ul>
            <li class="news-des "> <a href="<?=Url::to(['article/detail','id'=>$vo->id])?>"><?=Html::encode($vo->title) ?></a></li>
         </ul>  
         <?php endforeach;?>   
          
         <?php endif;?>
         
     

         </div>
        </div>
    <?php endforeach; ?>
    </div>    
  </div>
</div>

<div class="friendlink">
  <div class="am-container">
  <div class="am-u-sm-12">
    <h2>友情链接</h2>
     <?php foreach(\common\models\Nav::getItems('friend-link') as $v): ?>
      <a href="<?= Url::to($v['url']) ?>" target="_blank" title="<?= $v['label'] ?>"><?= $v['label'] ?></a>
     <?php endforeach; ?>
</div>
</div>

<style type="text/css">
  .am-slider-carousel li {
  margin-right: 5px;
}
</style>
</div>
<!-- /主体 -->
<?php
$this->registerJs(<<<JS
   var swiper = new Swiper('.swiper-container', {
      pagination: {
        el: '.swiper-pagination',
      },
    });

//   var checkLoginId = 0;
//   $('.login').click(function(){
// 	  $.ajax({ 
// 			type : "POST", //提交方式 
// 		    url : '/wx/qrcode.html',//路径 
// 		   /*  data : { 
// 		    	"scene_id" : ""
// 		    }, */
// 		    success : function(data) {
// 		    	$('#login').find('img').attr('src',data);
// 		    } 
// 		});
//      	checkLoginId = setInterval(checkLogin,5000);
//   }); 

//   $('.close-btn').click(function(){	
// 	 clearInterval(checkLoginId);
//   }); 
  
// function checkLogin(){
// 	$.ajax({ 
// 		type : "POST", //提交方式 
// 	    url : '/wx/checklogin.html',//路径 
// 	   /*  data : { 
// 	    	"scene_id" : ""
// 	    }, */
// 	    success : function(data) {
// 	    	var result = JSON.parse(data);
// 	    	if (result.flag) { 
// 	      		window.location.reload();
// 	      	} else { 
	       		
// 	      	} 
// 	    } 
// 	}); 
// }


     

//       $(".help-box-l>ul>li a").click(function(){
//         if($(this).next().is(":hidden")){
//           $(this).next().slideDown();
//           $(this).find(".icon-dayuhao").css({"transform":"rotate(180deg)","-webkit-transform":"rotate(180deg)"});
//         }else{
//           $(this).next().slideUp();
//           $(this).find(".icon-dayuhao").css({"transform":"rotate(360deg)","-webkit-transform":"rotate(360deg)"});
//         }
//       })

//       //案例二维码显示
//       $(".anli li").mouseover(function(){
//         $(this).children(".code-img-box").show()
//       })
//       $(".anli li").mouseout(function(){
//         $(this).children(".code-img-box").hide()
//       })

//     $('.am-thumbnail').mouseover(function(){
//       $(this).children('.shadow').show();
//     })
//     $('.am-thumbnail').mouseout(function(){
//       $(this).children('.shadow').hide();
//     })
JS
);
?>