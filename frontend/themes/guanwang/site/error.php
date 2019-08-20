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


    <div class="jumbotron" style="min-height: 600px; background-color: white;">
  <h1>404  页面找不到了</h1>
  <!-- <h2>404</h2> -->
 <!--  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p> -->
</div>




  
    <div class="error-search">
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
    </div>


</div>
</div>