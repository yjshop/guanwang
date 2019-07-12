<?php
use yii\helpers\Url;

?>

<footer>
  <div class="am-g am-container box">
    <div class="am-u-md-3 tc">
      <a href="#" class="logo"></a>
      <p class="des">几何线，微信小程序系统、支付宝小程序系统开发商</p>
    </div>
    <div class="am-u-md-2 tel-hide">
      <ul>
        <li class="tit">支持</li>
        <li><a href="/Index/faq.html">FAQ问题</a></li>
        <!-- <li><a href="">帮助中心</a></li> -->
        <li><a href="/Index/authorization.html">授权查询</a></li>
      </ul>
    </div>
    <div class="am-u-md-2 tel-hide">
      <ul>
        <li class="tit">关于我们</li>
        <li><a href="/index/contact.html">联系我们</a></li>
        <li><a href="/index/zhaopin.html">招聘信息</a></li>
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