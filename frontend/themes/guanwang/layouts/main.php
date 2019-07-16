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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="baidu-site-verification" content="MccTnGKbkm" />
    <?= Html::csrfMetaTags() ?>
    <title><?= $this->title ? Html::encode($this->title) . '-' . Yii::$app->config->get('site_name') : Yii::$app->config->get('site_name') ?></title>
    <link type="image/x-icon" href="<?= Yii::getAlias('@web') ?>favicon.ico" rel="shortcut icon">
    <script>var SITE_URL = '<?= Yii::$app->request->hostInfo . Yii::$app->request->baseUrl ?>';</script>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php if (!(new \Detection\MobileDetect())->isMobile()): ?>
<?= $this->render('_header') ?>
<?php else: ?>
    <?= $this->render('_nav') ?>
<?php endif; ?>

    <?php if (!(new \Detection\MobileDetect())->isMobile() && yii::$app->session->get('module')!='photo'): ?>
    <div class="am-container mgt60">
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
     </div>
    <?php endif; ?>
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
