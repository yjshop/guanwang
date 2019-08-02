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

use yii\helpers\Url;

$this->title = 'wiki';
$this->params['breadcrumbs'][] = 'wiki';
?>
<div class="banner-img">
  <img src="/Public/Home/images/banner03.jpg" alt="">
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
