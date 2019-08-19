<?php
/**
 * @var \yii\web\View $this
 */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\helpers\Url;
?>

<style type="text/css">
    .mgt7{margin-top: 7px;}
    .mgt10{margin-top: 10px;}
    .navbar-right li a {padding-bottom: 0;}
    .l-text{margin-top: 6px;}
</style>
   <!-- 头部 -->
    <header class="am-topbar am-topbar-fixed-top">
    <div class="am-container bg-f8">
        <h1 class="am-topbar-brand"><img src="<?=yii::$app->config->get('site_logo')?>" alt="几何线系统" class="am-img-responsive"></h1>
      <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: &#39;#doc-topbar-collapse&#39;}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>
      <div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse">
        <ul class="am-nav am-nav-pills am-topbar-nav">
         <li>
         <?php
        $navItems = \common\models\Nav::getItems('header');
        \yii\widgets\Spaceless::begin();
        echo \yii\widgets\Menu::widget([
            'items' => $navItems,
            'options' => ['class' => 'am-nav am-nav-pills am-topbar-nav mgt7'],
            'activeCssClass' => 'am-active'
        ]);
        \yii\widgets\Spaceless::end();
        ?>
        </li>
        
        <!-- 登录模块 -->
        <li>
        <?php \yii\widgets\Pjax::begin([
        'id' => 'header-container',
        'linkSelector' => false,
        'formSelector' => false,
        'options' => ['class' => 'm-sitenav clearfix']
        ]) ?>
            <?php
            $rightMenuItems = [];
            $noticeNum = Yii::$app->notify->getNoReadNum();

//             if ($noticeNum > 0) {
//                 $rightMenuItems[] = [
//                     'label' => '<i class="fa fa-bell"></i> <span class="badge">' . $noticeNum . '</span>',
//                     'items' => [
//                         [
//                             'label' => $noticeNum . '条新消息',
//                             'url' => ['/user/default/notice']
//                         ]
//                     ]
//                 ];
//             } else {
//                 $rightMenuItems[] = [
//                     'label' => '<i class="fa fa-bell"></i>',
//                     'url' => ['/user/default/notice']
//                 ];
//             }

            if (Yii::$app->user->isGuest) {
                $rightMenuItems[] = ['label' => Yii::t('common', 'Signup'), 'url' => ['/user/registration/signup'],'linkOptions' => [
                        'class' => 'l-text'
                    ]];
                $rightMenuItems[] = ['label' => Yii::t('common', 'Login'), 'url' => ['/user/security/login'],'linkOptions' => [
                        'class' => 'l-text'
                    ]];
            } else {
                $rightMenuItems[] = [
                    'label' => Html::img(Yii::$app->user->identity->getAvatar(32), ['width' => 32, 'height' => 32]),
                    'linkOptions' => [
                        'class' => 'avatar'
                    ],
                    'items' => [
                        [
                            'label' => Html::icon('user') . ' 个人主页',
                            'url' => ['/user/default/index', 'id' => Yii::$app->user->id],
                        ],
                        [
                            'label' => Html::icon('cog') . ' 账户设置',
                            'url' => ['/user/settings/profile'],
                        ],
//                         [
//                             'label' => Html::icon('book') . ' 我的投稿',
//                             'url' => ['/user/default/article-list'],
//                         ],
//                         [
//                             'label' => Html::icon('star') . ' 我的收藏',
//                             'url' => ['/user/default/favourite'],
//                         ],
                        [
                            'label' => Html::icon('sign-out') . ' 退出',
                            'url' => ['/user/security/logout'],
                            'linkOptions' => ['data-method' => 'post'],
                        ]
                    ],
                ];
            }

            $this->params['rightMenuItems'] = $rightMenuItems;
            $this->trigger('beforeRenderRightMenu');
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $this->params['rightMenuItems'],
                'encodeLabels' => false
            ]);
            ?>
          <?php \yii\widgets\Pjax::end() ?>
          </li>
<!--   登录模块end  -->

        </ul>
      </div> 
    </div>
</header>
<!-- <div style="width: 100%;height: 80px;" class="am-hide-sm-only"></div> -->