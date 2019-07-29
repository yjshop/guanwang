<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 2016/12/15
 * Time: 下午2:20
 */
/**
 * @var \yii\web\View $this
 * @var \common\modules\book\models\Book $model
 */

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Markdown;
use common\modules\book\models\Book;

/* $this->title = $model->book_name;
$this->params['breadcrumbs'][] = ['label' => 'wiki', 'url' => ['/book/default/index']];
$this->params['breadcrumbs'][] = Html::encode($model->book_name); */
?>
<?php /* $this->beginContent(__DIR__ . '/_layout.php', ['book' => $model]) */ ?>

<?php echo $this->render('search') ?>

<div class="am-container help">

<?php echo $this->render('left') ?>

<div class="am-u-md-9">
  <div class="help-box-r">
  		<div class="detail-tit">
	        <h1><?=$model['book_name']?></h1>
	        <p>
	          <span class="time"><?=$model['created_at']?></span>
	        </p>
	      </div>
      	<div class="content">
      	   <p style="line-height: 2em; text-indent: 2em;">
      	   <strong><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;"><?php echo ''; ?></span></strong></p>
      	   <p style="line-height: 2em; text-indent: 2em;"></p>
      	   <p style="text-align: center;"><strong><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; color: rgb(255, 0, 0);">感谢您使用几何线小程序商城系统，如在使用过程中遇见系统故障等问题，</span></strong></p>
      	   <p style="line-height: 2em; text-indent: 2em;">
           <strong><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; color: rgb(255, 0, 0);">咨询热线：0777—2110336，我们将竭诚为您服务！</span></strong></p>
           <p><br></p>    	
      	</div>
  </div>
    <div class="page">
    
    </div>
  </div>
 </div>