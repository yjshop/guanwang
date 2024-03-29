<?php

use yii\helpers\Html;
use yii\helpers\Url;

/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/4/7
 * Time: 下午6:13
 */
$this->title = '个人中心';
?>
<div class="container profile" >
<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-body" style="background: url(http://www.yiichina.com/images/user-bg.jpg); background-size:100% 120px; background-repeat:no-repeat;">
            <div class="profile-user">
                <a href="<?= Url::to(['/user/settings/avatar']) ?>" title="" data-toggle="tooltip" data-original-title="点击修改头像">
                    <?= Html::img($user->getAvatar(96), ['class' => 'avatar']) ?>
                </a>
                <h1><?= Html::encode($user->username) ?></h1>
                <span class="label label-primary"><?= $user->getLevel()['nick'] ?></span>
                <p><?= $user->profile->signature?></p>
                <div >
                    <a class="follow btn btn-xs <?php if((new \common\models\Friend())->isFollow($user->id)): ?>btn-danger <?php else: ?>btn-success <?php endif; ?> <?php if ($user->id == Yii::$app->user->id): ?><?php endif; ?>" href="<?= Url::to(['/friend/follow', 'id' => $user->id]) ?>"><?php if (!(new \common\models\Friend())->isFollow($user->id)): ?><i class="fa fa-plus"></i> 关注Ta <?php else: ?>取消关注 <?php endif; ?></a>
                    <a class="btn btn-xs btn-primary<?php if ($user->id == Yii::$app->user->id):?> <?php endif; ?>" href="<?= Url::to(['/message/default/create', 'id' => $user->id]) ?>"><i class="fa fa-envelope"></i> 发私信</a>
                </div>
                <ul class="stat">
                    <li>金钱<h3><?= $user->profile->money ?></h3></li>
                    <li>关注<h3><?= \common\models\Friend::getFollowNumber($user->id) ?></h3></li>
                    <li>粉丝<h3><?= \common\models\Friend::getFansNumber($user->id) ?></h3></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">个人信息  <span class="pull-right"><a href="<?= Url::to(['/user/settings/profile']) ?>" title="" data-toggle="tooltip" data-original-title="点击修改个人信息"><i class="fa fa-cog"></i> </a></span></div>
           
        </div>
        <div class="panel-body">
            <ul class="user-info">
                <li><i class="fa fa-calendar fa-fw"></i> 注册时间：<?= Yii::$app->formatter->asDatetime($user->created_at) ?></li>
                <li><i class="fa fa-sign-in fa-fw"></i> 最后登录：<?= Yii::$app->formatter->asRelativeTime($user->login_at) ?></li>
                <li><i class="fa fa-map-marker fa-fw"></i> 所在地： <?= $user->profile->fullArea ?></li>
                <li><i class="fa fa-map-signs fa-fw"></i> 个性签名： <?= $user->profile->signature ?></li>
                <li><i class="fa fa-envelope-o fa-fw"></i> 邮箱：<?= $user->email ?></li>
                <li><i class="fa fa-qq fa-fw"></i> QQ：<?= $user->profile->qq ?></li>
                <li><i class="fa fa-phone fa-fw"></i> 手机：<?= $user->profile->phone ?></li>
            </ul>
        </div>
    </div>
</div>
<div class="col-md-9">
    <table class="table table-bordered table-sign">
        <thead>
        <tr><th style="color:red">日</th><th>一</th><th>二</th><th>三</th><th>四</th><th>五</th><th style="color:red">六</th></tr>
        </thead>
        <tbody>
        <?php foreach ($weeks as $week): ?>
            <tr>
                <?php for ($i=0; $i<7; $i++): ?>
                    <td<?php if(isset($week[$i]) && $week[$i]['sign']): ?> class="success"<?php endif; ?>>
                        <?php if(isset($week[$i])): ?>
                            <?= $week[$i]['day'] ?>
                        <?php endif; ?>
                    </td>
                <?php endfor; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>