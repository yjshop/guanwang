<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\themes\guanwang\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => isset($this->params['seo_site_keywords']) ? $this->params['seo_site_keywords'] : Yii::$app->config->get('seo_site_keywords')
], 'keywords');
$this->registerMetaTag([
    'name' => 'description',
    'content' => isset($this->params['seo_site_description']) ? $this->params['seo_site_description'] : Yii::$app->config->get('seo_site_description')
], 'description');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">

    <meta name="baidu-site-verification" content="MccTnGKbkm" />
    <?= Html::csrfMetaTags() ?>
    <title><?= $this->title ? Html::encode($this->title) . '-' . Yii::$app->config->get('site_name') : Yii::$app->config->get('site_name') ?></title>
    <link type="image/x-icon" href="<?= Yii::getAlias('@web') ?>favicon.ico" rel="shortcut icon">
    <script>var SITE_URL = '<?= Yii::$app->request->hostInfo . Yii::$app->request->baseUrl ?>';</script>
    <?php $this->head() ?>
 
<?php    
$this->registerJs(<<<JS

var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?8a5588d8eede714bace1071c11806362";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();

JS
); 
?>
    
   
      
</head>
<body>
<?php $this->beginBody() ?>

<?= $this->render('_header') ?>


<!--删除的面包屑位置-->
     <?php if (!(new \Detection\MobileDetect())->isMobile()): ?>
    <div class="am-container mgt60">
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
     </div>
    <?php endif; ?>
<!--面包屑end -->
    <?= \common\widgets\Alert::widget()?>
    <?= $content ?>

<?= $this->render('_footer') ?>
<?php if(Yii::$app->user->isGuest): ?>
    <?= $this->render('_login') ?>
<?php endif; ?>

<?php $this->endBody() ?>
<?php if (isset($this->blocks['js'])): ?>
    <?= $this->blocks['js'] ?>
<?php endif; ?>

</body>
</html>
<?php $this->endPage() ?>