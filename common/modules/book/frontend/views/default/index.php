<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 2016/12/15
 * Time: 下午8:59
 */

/**
 * @var \yii\web\View $this
 */

use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'wiki';
$this->params['breadcrumbs'][] = 'wiki';
?>
<?php echo $this->render('search',['msg'=>$msg]); ?>

<div class="am-container help">

<?php echo $this->render('left'); ?>

<div class="am-u-md-9">
  <div class="help-box-r">
  		    	<div class="bd">    	
        	<ul class="list-items help-lists am-g">
        	<?php foreach ($books as $bk): ?>
        	      <li class="am-u-md-3 am-u-sm-6">
              		<a class="list-item" href="<?=Url::to(['default/view','id'=>$bk['id']]); ?>">
               		<div class="help-cover"><img src="<?=$bk['book_cover']?>"></div>
               		<div class="help-title"><p><?= $bk['book_name'] ?></p></div>
                    </a>
                  </li> 
             <?php endforeach; ?>   
           </ul>
          <?= LinkPager::widget(['pagination' => $pagination]) ?>       
      </div>
   </div>
</div>
</div>

