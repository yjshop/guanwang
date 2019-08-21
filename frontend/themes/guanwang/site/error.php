<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>

<div class="am-container">
<div class="site-error">


    <div class="jumbotron" style="background-color: white; ">
  <h1 class="center-block">404 NOT FOUND</h1>
  <h2  class="" style="display: inline-block;">您访问的页面不见了，去其他页面看看吧</h2>
  <p style="margin-top: 30px;"><a class="btn btn-default btn-lg" href="/" role="button" style="margin-right: 20px;">返回首页</a>
    <a class="btn btn-default btn-lg" href="#" role="button" onclick="javascript:window.history.back(-1);">返回前页</a></p>
  <!-- <h2>404</h2> -->
 <!--  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p> -->
</div>




  
   <!--  <div class="error-search">
        <form action="<?= url(['/search']) ?>" method="get">
            <div class="input-group">
                <input type="text" class="form-control" name="q" placeholder="全站搜索">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </span>
            </div>
        </form>
    </div> -->


</div>
</div>