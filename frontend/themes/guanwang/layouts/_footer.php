<?php
use yii\helpers\Url;

?>

<footer>
  <div class="am-g am-container box">
    <div class="am-u-md-3 tc">
      <a href="#" class="logo" style =" background: url(<?php echo Url::to('@web/storage/images/buttom_logo.png');?>) no-repeat left top;) "></a>
      <p class="des">几何线，微信小程序系统、支付宝小程序系统开发商</p>
    </div>
    <div class="am-u-md-2 tel-hide">
      <ul>
        <li class="tit">支持</li>
        <li><a href="<?= Url::to(['site/faq'])?>">FAQ问题</a></li>
        <!-- <li><a href="">帮助中心</a></li> -->
        <li><a href="<?php echo Url::to(['visitor/index']); ?>">授权查询</a></li>
      </ul>
    </div>
    <div class="am-u-md-2 tel-hide">
      <ul>
        <li class="tit">关于我们</li>
        <li><a href="<?= Url::to(['page/slug','slug'=>'aboutus'])?>">联系我们</a></li>
<!--         <li><a href="/index/zhaopin.html">招聘信息</a></li>     -->
        <li><a rel="nofollow" href="http://shang.qq.com/wpa/qunwpa?idkey=0b70447a4e376c39e302c369172bfb0ea800251c50cdc450d94b3bfc0f08923b">加入QQ群</a></li>
      </ul>
    </div>
    <div class="am-u-md-2">
      <p class="tit tel-hide">关注几何线</p>
      <img src="<?php echo Url::to('@web/storage/images/weixin.jpg'); ?>" class="weixin">
    </div>
    <div class="am-u-md-3">
      <div>
        <img src="/storage/images/tel.png" class="tel-img">
        <div style="display: inline-block;">
         <p class="tit">咨询热线</p> 
         <p class="tel">0777-2110336</p>
         <p class="qq tel-hide" onclick="window.location.href='http://wpa.qq.com/msgrd?v=3&uin=1636861793&site=qq&menu=yes'">在线QQ咨询</p>
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="am-g am-container box">
            <p>&copy; <?= Yii::$app->config->get('site_name').' '.date('Y') ?></p>
            <p><?= Yii::$app->config->get('SITE_ICP')?></p>
        </div> -->
</footer>

<!-- 二维码显示 -->
<!-- <div style="position: fixed;right: 0;top:45%;" class="am-show-sm-only">
  <div style="padding: 10px;background-color: #fff;">
    <img width="100" src="<?php echo Url::to('@web/storage/images/miniQrcode.jpg') ?>">
    <div style="width: 100px;text-align: center;background-color: #fff;">微信长按体验</div>
  </div>
</div> -->



<!-- 侧边客服 --> 
<!-- 新加的 -->
<!-- <div class="sideBox am-show-lg-only"> -->
  
 <!--  <ul> -->
    
 <!--    <li><img src="<?php echo Url::to('@web/storage/images/QQ.png') ?>">

      <a  href="" class="sideBox-1"style="display: none;">
    
        <div><img src="<?php echo Url::to('@web/storage/images/qq2.png') ?>"></div>
        <p>咨询在线客服</p>
        </a>  
   </li> -->

<!--     <li><img src="<?php echo Url::to('@web/storage/images/phone2.png') ?>">

          <a  href="" class="sideBox-2" style="display: none;">
    
        <div><img src="<?php echo Url::to('@web/storage/images/phone1.png') ?>" ></div>
       <div><p>服务热线</p>
        <p>0777-1234567</p>
      </div>
        </a>  
    </li> -->
 <!--    <li><img src="<?php echo Url::to('@web/storage/images/qr_code.png') ?>">

        <div  class="sideBox-3" style="display: none;">
    
        <div><img src="<?php echo Url::to('@web/storage/images/gzh.jpg') ?>"></div>
      
        <p>几何线公众号</p>
        </div>  
    </li>
  </ul>
</div> -->






<div class="sideBox am-show-lg-only">
  
  <ul>
    
<!--     <li>
      <div class="sideBox-0 ">
      <img src="<?php echo Url::to('@web/storage/images/QQ.png') ?>">
      </div>
      <a href="" class="sideBox-1" style="display: none;">
    
        <div><img src="<?php echo Url::to('@web/storage/images/qq2.png') ?>"></div>
        <p>咨询在线客服</p>
        </a>  
    


    </li> -->
    <li>  <div class="sideBox-0 "><img src="<?php echo Url::to('@web/storage/images/phone2.png') ?>"></div>

          <a href="" class="sideBox-2" style="display: none;">
    
        <div><img src="<?php echo Url::to('@web/storage/images/phone1.png') ?>" ></div>
       <div><p>服务热线</p>
        <p>0777-2110336</p>
      </div>
        </a>  


    </li>
    <li>  
<div class="sideBox-0 ">
     <img src="<?php echo Url::to('@web/storage/images/qr_code.png') ?>">
</div>
        <div class="sideBox-3" style="display: none;">
    
        <div><img src="<?php echo Url::to('@web/storage/images/gzh.jpg') ?>"></div>
      
        <p>几何线公众号</p>
        </div>  

    </li>

          <li>  
<div class="sideBox-0 ">
     <img src="<?php echo Url::to('@web/storage/images/rtop.png') ?>">
</div>
</li>





  </ul>
</div>

<!-- /新加的 -->
<!-- /侧边客服 -->
</div> 
<?php  
$this->registerJs(<<<JS
  //客服js
    var ele='.sideBox-';
    $('.sideBox li').hover(function(){

        
          $(this).parent().find('.sideBox-0').toggleClass('sideBox-current');
            if($(this).index()<2){
         ele='.sideBox-'+($(this).index()+2);
        $(ele).stop().toggle();
      }
    });

     $('.sideBox li').click(function(){
        if($(this).index()==2){
      $('html, body').stop().animate({scrollTop:0}, 500);
            }
      });
     
      

JS
); 
?>