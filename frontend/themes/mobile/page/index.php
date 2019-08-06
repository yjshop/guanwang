<?php
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = $page->title;
list($this->title, $this->params['SEO_SITE_KEYWORDS'], $this->params['SEO_SITE_DESCRIPTION']) = $page->getMetaData();
?>
<?php echo $this->render('top'); ?>

<div class="am-container layout">
  <div class="am-g">
      
      <?php echo $this->render('left',['show'=>$show]); ?>
      
      <div class="am-u-md-10">
        <div class="brief">
          <div class="img-box"><!-- <img src="/Public/Home/images/images/00.jpg"> --></div>
          <div class="tit">公司简介</div>
          
          <div class="content">
          
            <p>
             <?= $page->getProcessedContent()?>
            </p>
           
          </div>
        </div>
      </div>   
       
  </div>
</div>














   

