<?php
use yii\helpers\Html;
$this->title = $page->title;
list($this->title, $this->params['SEO_SITE_KEYWORDS'], $this->params['SEO_SITE_DESCRIPTION']) = $page->getMetaData();
?>
<div class="banner-img">
  <img src="/storage/images/banner03.jpg" alt="">
  <div class="page-title">关于我们</div>
</div>




<div class="am-container layout">
  <div class="am-g">
      <div class="am-u-md-2 lay-l">
        <ul>
          <li><a href="about.html" class="active"><i class="iconfont icon-gongsixinxi1"></i>公司介绍</a></li>
          <li><a href="zizhi.html"><i class="iconfont icon-zizhi"></i>公司资质</a></li>
          <li><a href="zhaopin.html"><i class="iconfont icon-rencaizhaopin1"></i>人才招聘</a></li>
          <li><a href="contact.html"><i class="iconfont icon-lianxiwomen"></i>联系我们</a></li>
        </ul>
      </div>
      <div class="am-u-md-10">
        <div class="brief">
          <div class="img-box"><!-- <img src="/Public/Home/images/images/00.jpg"> --></div>
          <div class="tit">公司简介</div>
          <div class="content">
            <p>
             <?= $page->getProcessedContent()?>
            </p>
          </div>
        </div>
      </div>
  </div>
</div>














   

