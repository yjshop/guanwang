<?php 
?>

<div class="banner1 am-g">
<img src="/storage/images/banner03.jpg">
<div class="page-title phone-help">帮助中心</div>
   <div class="search-box">
      <h1 class="help-tit">帮助中心</h1>
      <div class="am-input-group" style="width: 100%;">
      	<form action="" method="post" style="display: table;width:100%;">
        <input type="text" name="bk" class="am-form-field" value="<?php $msg ?>" placeholder="请用关键词进行检索">
        <input name="_csrf" type="hidden" value="<?=yii::$app->request->csrfToken?>">
        <span class="am-input-group-btn">
          <button class="am-btn am-btn-default" type="submit"><span class="am-icon-search"></span>
      </button></span>
      </form></div>
      <!-- <p class="des">搜索热词：<a href="">小程序</a><a href="">支付</a><a href="">授权</a><a href="">提现</a></p> -->
    </div>
</div>