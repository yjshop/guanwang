<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

 <li class="list-item">
            <div class="am-g">
              <div class="am-u-md-3 am-u-sm-3">
                <div class="img-box">
                  <?php if ($model->cover): ?>
                    <a href="<?= Url::to(['article/view', 'id' => $model->id])?>"><?= Html::img($model->cover, ['width' => 160, 'height' => 120]) ?></a>
                <?php endif; ?>
                </div>
              </div>
              <div class="am-u-md-9 am-u-sm-9 item-r">
                    <h2><?= $model->title?></h2>
                    <p><?= $model->description ?></p>
                   <div class="list-footer">
                     <span class="time am-margin-right-sm list-footer-hd"><?= Yii::$app->formatter->asRelativeTime($model->published_at) ?></span>
                     <span class="am-margin-right-sm">浏览量（ <?= $model->trueView?>）</span> 
                  </div>
                </div>
            </div>
      
       </li>