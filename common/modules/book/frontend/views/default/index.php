<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 2016/12/15
 * Time: 下午8:59
 */

/**
 * @var \yii\web\View $this
 */
$this->title = 'wiki';
$this->params['breadcrumbs'][] = 'wiki';
?>

<div class="banner1 am-g">
<img src="/storage/images/banner03.jpg">
<div class="page-title phone-help">帮助中心</div>
   <div class="search-box">
      <h1 class="help-tit">帮助中心</h1>
      <div class="am-input-group" style="width: 100%;">
      	<form action="" method="get" style="display: table;width:100%;">
        <input type="text" name="title" class="am-form-field" placeholder="请用关键词进行检索">
        <span class="am-input-group-btn">
          <button class="am-btn am-btn-default" type="submit"><span class="am-icon-search"></span>
      </button></span></form></div>
      <!-- <p class="des">搜索热词：<a href="">小程序</a><a href="">支付</a><a href="">授权</a><a href="">提现</a></p> -->
    </div>
</div>

<div class="am-container help">
  <div class="am-u-md-3">
  	<div class="help-box-l">
  		<ul class="">
        <li>
				  <a href="javascript:;"><i class="iconfont icon-zhidao"></i>入门指导<span class="iconfont icon-dayuhao"></span></a>
				  <ul class="child" style="display:block">
  				  <li><a href="/index/help/id/72.html" style="color:#31b3a4;background-color:#f5f5f5">系统操作教程</a></li>  				  </ul>
  			   </li><li>
				  <a href="javascript:;"><i class="iconfont icon-zhidao"></i>微信<span class="iconfont icon-dayuhao"></span></a>
				  <ul class="child" style="display:block">
  				  <li><a href="/index/help/id/74.html" style="">小程序</a></li><li><a href="/index/help/id/75.html" style="">公众号</a></li>  				  </ul>
  			   </li>  		</ul>
  	</div>
  </div>

  <div class="am-u-md-9">
  <div class="help-box-r">
  		    	<div class="bd">    	
        	<ul class="list-items help-lists">
        	
          	<li class="list-item">
              <a href="/index/help/aid/348.html">
                <div class="am-g">
                    <div class="am-u-md-3 am-u-sm-3">
                      <div class="img-box">
                        <img src="/Public/static/nopic.jpg">
                      </div>
                    </div>
                    <div class="am-u-md-9 am-u-sm-9 item-r">
                          <h2>操作教程4：商品、统计分析与营销活动设置</h2>
                          <p>商品、统计分析与营销活动设置</p>
                         <div class="list-footer">
                           <span class="time am-margin-right-sm list-footer-hd">2018-10-25 16:36</span>                         
                        </div>
                      </div>
                  </div>
              </a>
             </li>
           </ul>
      	</div>
   </div>
<div class="page">
<div>    </div>   </div>
</div>	
</div>
<?= \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_item',
    'layout' => '{items} {pager}',
    'options' => [
        'class' => 'row'
    ],
    'itemOptions' => [
        'class' => 'col-xs-3'
    ],
]) ?>

