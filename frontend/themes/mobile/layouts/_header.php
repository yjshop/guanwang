<?php
/**
 * @var \yii\web\View $this
 */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\helpers\Url;
?>


   <!-- 头部 -->
    <header class="am-topbar am-topbar-fixed-top">
    <div class="am-container bg-f8">
        <h1 class="am-topbar-brand"><img src="<?=yii::$app->config->get('site_logo')?>" alt="几何线系统" class="am-img-responsive"></h1>
      <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: &#39;#doc-topbar-collapse&#39;}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>
      <div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse">
        <ul class="am-nav am-nav-pills am-topbar-nav">
         <?php
        $navItems = \common\models\Nav::getItems('header');
        \yii\widgets\Spaceless::begin();
        echo \yii\widgets\Menu::widget([
            'items' => $navItems,
            'options' => ['class' => 'am-nav am-nav-pills am-topbar-nav'],
            'activeCssClass' => 'am-active'
        ]);
        \yii\widgets\Spaceless::end();
        ?>
             
        </ul>
      </div> 
    </div>
</header>
