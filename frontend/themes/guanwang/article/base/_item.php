<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

             <li class="list-item">
                    <div class="am-g">
                           
                            <div class="am-u-md-4 am-u-sm-4">
                             <?php if($model->cover):?>
                            <div class="img-box">
                           
                                <a href="<?= Url::to(['article/view', 'id' => $model->id])?>">   <?=Html::img($model->cover, ['width' => 300, 'height' => 140]) ?></a>
                            </div>
                             <?php else:?>
                            <div class="news_list_left">
					 		<div class="date"> <?= Yii::$app->formatter->asDatetime($model->created_at, 'php:d') ?></div>
					 		<div class="year"> <?= Yii::$app->formatter->asDatetime($model->created_at, 'php:Y-m') ?></div>
					 		<div class="editor">几何线系统 </div>
					 		
					 	  </div>
                          <?php endif;?>    
                          </div>
                            <div class="am-u-md-8 am-u-sm-8 item-r">
                                 <a href="<?= Url::to(['article/view', 'id' => $model->id])?>">  <h2><?= $model->title?></h2></a>
                                <div class="info"> <span class="time am-margin-right-sm "><a href="<?= Url::to(['/user/default/index', 'id' => $model->user_id]) ?>"><?= Html::icon('user')?> <?= $model->user->username?></a></span> <span class="time am-margin-right-sm "><?= Html::icon('clock-o')?> <?= Yii::$app->formatter->asDatetime($model->created_at, 'php:Y-m-d') ?></span>
                                    <span class="am-margin-right-sm"><?= Html::icon('eye')?> <?= $model->trueView?></span> <span class="am-margin-right-sm"><?= Html::icon('comments-o')?> <?= $model->commentTotal ?></span>
                                </div>
                                <p><a href="<?= Url::to(['article/view', 'id' => $model->id])?>"> <?= $model->description ?></a></p>
                                <div class="list-footer">
                                    <ul class="tag-list">
                                     <?php foreach ($model->tags as $key=> $tag):?>
                                        <li><a class="tag tag-<?= $key ?>" href="<?= \yii\helpers\Url::to(['article/tag', 'name' => $tag->name])?>"><?=$tag->name?></a></li>
                                     <?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                          
                       
                            
              
                   </div>
                </li>