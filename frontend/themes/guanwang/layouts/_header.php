<?php
/**
 * @var \yii\web\View $this
 */
use yii\helpers\Html;
use yii\bootstrap\Nav;
?>
    <header class="am-topbar am-topbar-fixed-top">
 <?php \yii\widgets\Pjax::begin([
        'id' => 'header-container',
        'linkSelector' => false,
        'formSelector' => false,
        'options' => ['class' => 'm-sitenav clearfix']
    ]) ?>
    <div class="am-container bg-f8">
        <h1 class="am-topbar-brand"><a href="<?= \yii\helpers\Url::home() ?>" title="<?= Yii::$app->config->get('site_name') ?>" ><img src="<?= Yii::$app->config->get('site_logo') ?>" alt="几何线系统" class="am-img-responsive"></a></h1>
      <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#doc-topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>
       <div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse">
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

      </div>  
    </div>
</header>