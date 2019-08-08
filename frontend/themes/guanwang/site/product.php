<?php
use yii\helpers\Url;

?>
<div class="product-wrap">
   <!--  轮播图 -->
    <?php if(empty($head_img)):?>
    
   <?php else: ?>
    <div class="banner am-g">
    <img src="<?=$head_img['image'] ?>">   
    </div>
    <?php endif; ?>



    <!-- /主体 -->


  
<div class="pro-adv am-hide-sm-only">
	<div class="am-container">
		<div class="am-g">
			<div class="am-u-md-2 am-u-sm-6">
				<div class="pro-adv-top"><img src="<?php echo Url::to('@web/storage/images/huojian.png'); ?>"><h2>流畅度</h2></div>
				<p>超流畅app原生开发</p>

			</div>
			<div class="am-u-md-2 am-u-sm-6">
				<div class="pro-adv-top"><img src="<?php echo Url::to('@web/storage/images/gongneng.png'); ?>"><h2>功能性</h2></div>
				<p>超流畅app原生开发</p>

			</div>
			<div class="am-u-md-2 am-u-sm-6">
				<div class="pro-adv-top"><img src="<?php echo Url::to('@web/storage/images/pinzhi.png'); ?>"><h2>品质感</h2></div>
				<p>精致的界面与完善的流程</p>

			</div>
			<div class="am-u-md-2 am-u-sm-6">
				<div class="pro-adv-top"><img src="<?php echo Url::to('@web/storage/images/tuozhan.png'); ?>"><h2>拓展性</h2></div>
				<p>支持开源与源码选购</p>

			</div>
			<div class="am-u-md-2 am-u-sm-6">
				<div class="pro-adv-top"><img src="<?php echo Url::to('@web/storage/images/pinpai.png'); ?>"><h2>品牌性</h2></div>
				<p>域名服务器及品牌独立</p>

			</div>
			<div class="am-u-md-2 am-u-sm-6">
				<div class="pro-adv-top"><img src="<?php echo Url::to('@web/storage/images/shouhou.png'); ?>"><h2>售后技术</h2></div>
				<p>6*12h售后保障</p>

			</div>


		</div>
	</div>
</div>





<!-- 营销插件 -->
<div class="pro-plug am-hide-sm-only">
	
<h1 class="big-title">丰富的营销插件</h1>
<p>丰富的营销插件扩展让你的平台不管需求如何、体量多大，都能轻松组合应对</p>

<div class="am-container">
	
	<div class="plug-btn  ">
		<button type="button" class="am-btn  am-btn-primary st-btn" value="1">限时秒杀</button>
		<button type="button" class="am-btn  am-btn-primary st-btn" value="2">三级分销</button>
		<button type="button" class="am-btn  am-btn-primary st-btn" value="3">优惠券</button>
	</div>

	<ul class="plug-img ">
	<?php foreach ($market_img as $mun): ?>
		<li>
			<img src="<?= $mun['image'] ?>">
		</li>
	<?php endforeach;?>
	</ul>

  <div class="plug-img am-show-sm-only">
    <img src="<?php echo Url::to('@web/storage/images/huiyuan1.jpg');?>">
  </div>
</div>
</div>



<!-- <div class="pro-plug-m am-show-sm-only">
  <h1 class="big-title">丰富的营销插件</h1>
<p>丰富的营销插件扩展让你的平台不管需求如何、体量多大，都能轻松组合应对</p>


 <div class="swiper-container swiper3">
    <div class="swiper-wrapper">
      <div class="swiper-slide"><img src="<?php echo Url::to('@web/storage/images/anli1.jpg');?>"></div>
      <div class="swiper-slide"><img src="<?php echo Url::to('@web/storage/images/anli1.jpg');?>"></div>
      <div class="swiper-slide"><img src="<?php echo Url::to('@web/storage/images/anli1.jpg');?>"></div>
      <div class="swiper-slide"><img src="<?php echo Url::to('@web/storage/images/anli1.jpg');?>"></div>
      <div class="swiper-slide"><img src="<?php echo Url::to('@web/storage/images/anli1.jpg');?>"></div>
      
    </div>
  </div>

</div> -->


<div class="feature">
 
  <div class="dingdan bg-two-components">
    <div class="am-container">
      <div class="am-g">

   <div class="am-u-md-4 am-show-sm-only">
          <div class="word ">
            <h2>订单流程</h2>
            <p>下单</p>
            <p>支付</p>
            <p>点评</p>
           <!--  <p>售后申请</p>
            <p>退货</p> -->
          </div>
        </div>



        <div class="am-u-md-6 tl">


 <!--    	  <div class="swiper-container">
    <div class="swiper-wrapper">
   
      <div class="swiper-slide" style="background-image:url(http://lorempixel.com/600/600/nature/5)"></div>
      <div class="swiper-slide" style="background-image:url(http://lorempixel.com/600/600/nature/6)"></div>
      <div class="swiper-slide" style="background-image:url(http://lorempixel.com/600/600/nature/7)"></div>
      <div class="swiper-slide" style="background-image:url(http://lorempixel.com/600/600/nature/8)"></div>
      <div class="swiper-slide" style="background-image:url(http://lorempixel.com/600/600/nature/9)"></div>
      <div class="swiper-slide" style="background-image:url(http://lorempixel.com/600/600/nature/10)"></div>
    </div>
   
    <div class="swiper-pagination"></div>
  </div>
  </div> -->



<!-- <div data-am-widget="slider" class="am-slider am-slider-default" data-am-slider='{&quot;animation&quot;:&quot;slide&quot;,&quot;controlNav&quot;:&quot;thumbnails&quot;}'> -->
  <div data-am-widget="slider" class="am-slider  am-slider-default" data-am-slider='{&quot;controlNav&quot;:false}'>
  <ul class="am-slides">
     <?php foreach ($detail_img as $num1): ?>
    <li data-thumb="<?=$num1['image']?>">
      <img src="<?=$num1['image']?>">
    </li>
    <?php endforeach;?>
  </ul>
</div>



         <!--  <img src="images/dingdan00.png"> -->
        </div>
        <div class="am-u-md-4 am-hide-sm-only">
          <div class="word word-r">
            <h2>订单流程</h2>
            <p>下单</p>
            <p>支付</p>
            <p>点评</p>
            <p>售后申请</p>
            <p>退货</p>
          </div>
        </div>
      </div>    
    </div>
  </div>
  <div class="shuju">
    <div class="am-container">
      <div class="am-g">
        <div class="am-u-md-4">
          <div class="word">
            <h2>多种支付方式</h2>
            <p>微信支付</p>
            <p>支付宝支付</p>
            <p>……</p>
            
          </div>
        </div>
        <div class="am-u-md-7 tr" style="text-align: right;">
          <img src="<?= $pay_img['image']?>">
        </div>
      </div>
    </div>
  </div>


<div class="duoduan bg-two-components">
    <div class="am-container">
      <div class="am-g">
        <div class="am-u-md-8 tl">
          <img src="<?= $order_img['image']?>">
        </div>
        <div class="am-u-md-4">
          <div class="word word-r">
            <h2>订单管理</h2>
            <p>订单选购</p>
            <p>订单列表</p>
            <p>订单查询及打印</p>
            <p>添加订单</p>
            <p>……</p>
          </div>
        </div>
      </div>    
    </div>
  </div>

</div>


<div class="pro-expert">
	<div class="am-container">
	<h1 class="big-title">020系统专家，几何线品质保障</h1>
	<p>几何线成立于2015年，目前拥有进百人的团队规模，专注于服务创业者</p>

	<div class="am-g">
  <div class="am-u-lg-3 am-u-sm-6">
    <div class="am-thumbnail">
      <img src="<?php echo Url::to('@web/storage/images/mingxing.png');?>" alt=""/>
      <figcaption class="am-thumbnail-caption">国内知名创业解决方案服务商</figcaption>
    </div>
  </div>

  <div class="am-u-lg-3  am-u-sm-6">
    <a href="#" class="am-thumbnail">
      <img src="<?php echo Url::to('@web/storage/images/ren.png');?>" alt=""/>
      <figcaption class="am-thumbnail-caption">100+开发人员</figcaption>
    </a>
  </div>
  <div class="am-u-lg-3  am-u-sm-6">
    <figure class="am-thumbnail">
      <img src="<?php echo Url::to('@web/storage/images/kehu.png');?>" alt=""/>
      <figcaption class="am-thumbnail-caption">5000+商业用户</figcaption>
    </figure>
  </div>
   <div class="am-u-lg-3  am-u-sm-6">
    <figure class="am-thumbnail">
      <img src="<?php echo Url::to('@web/storage/images/xin.png');?>" alt=""/>
      <figcaption class="am-thumbnail-caption">7 x 12h售后支持</figcaption>
    </figure>
  </div>
</div>

</div>
</div>













<!-- 服务支持 -->
<div class="pro-support">
	<div class="am-container">
	<h1 class="big-title">服务支持</h1>
	<p class="p1">我们珍惜您每一次在线问询，有问必答，用专业的态度，贴心的服务。让您真正感受到我们与众的不同！</p>
<div class="am-g">
	<div class="am-u-lg-4 am-u-sm-4">
		<div class="sup-img"><img src="<?php echo Url::to('@web/storage/images/hezuo.png');?>"></div>
		<h2>小程序申请</h2>
		<p class="am-hide-sm-only">小程序制作从提出需求到小程序制作报价，再到小程序制作，每一步都是规范和专业的</p>
	</div>
	<div class="am-u-lg-4 am-u-sm-4">
		<div class="sup-img"><img src="<?php echo Url::to('@web/storage/images/wenti.png');?>"></div>
		<h2>常见问题</h2>
		<p class="am-hide-sm-only">什么是小程序定制，你们的报价如何，等小程序建设常见问题</p>
	</div>
	<div class="am-u-lg-4 am-u-sm-4">
		<div class="sup-img"><img src="<?php echo Url::to('@web/storage/images/baozhang.png');?>"></div>
		<h2>售后保障</h2>
		<p class="am-hide-sm-only">小程序制作不难，难的是一如既往的热情和服务支持。我们知道：做小程序就是做服务，就是做售后</p>
	</div>

</div>

</div>
</div>

</div> 
<?php echo ' 
<style type="text/css">
.am-slider-carousel li 
{
  margin-right: 5px;
}
</style>
';
?>


<?php  
$this->registerJs(<<<JS
 

    //详细的订单管理轮播图
    //  var swiper = new Swiper('.dingdan .swiper-container', {
    //   effect: 'coverflow',
    //   grabCursor: true,
    //   centeredSlides: true,
    //   slidesPerView: 'auto',
    //   coverflowEffect: {
    //     rotate: 50,
    //     stretch: 0,
    //     depth: 100,
    //     modifier: 1,
    //     slideShadows : true,
    //   },
    //   pagination: {
    //     el: '.swiper-pagination',
    //   },
    // });

     



      $(".help-box-l>ul>li a").click(function(){
        if($(this).next().is(":hidden")){
          $(this).next().slideDown();
          $(this).find(".icon-dayuhao").css({"transform":"rotate(180deg)","-webkit-transform":"rotate(180deg)"});
        }else{
          $(this).next().slideUp();
          $(this).find(".icon-dayuhao").css({"transform":"rotate(360deg)","-webkit-transform":"rotate(360deg)"});
        }
      })


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



     // 手机端插件轮播图

        var swiper3 = new Swiper('.swiper3', {
        roundLengths:true, 
        initialSlide:1,
        centeredSlides : true,
        speed:600,
      slidesPerView: "auto",
      autoplay: 3000,
      loop:true,
      followFinger:false
      // pagination: {
      //   el: '.swiper-pagination',
      //   clickable: true,
      // },
    });

      




JS
); 
?>