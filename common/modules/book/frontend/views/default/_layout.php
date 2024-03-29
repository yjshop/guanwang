<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 2016/12/15
 * Time: 下午3:14
 */

/**
 * @var \yii\web\View $this
 * @var common\modules\book\models\Book $book
 */
use common\helpers\Tree;

?>
<?php 
$chapters = $book->chapters;
$items = [];
foreach ($chapters as $chapter) {
    $item = [];
    $item['label'] = $chapter->chapter_name;
    $item['url'] = ['chapter', 'id' => $chapter->id];
    $item['active'] = request('id') == $chapter->id && Yii::$app->controller->action->id == 'chapter';
    $item['id'] = $chapter->id;
    $item['pid'] = $chapter->pid;
    $item['linkOptions'] = ['data-id' => $chapter->id, 'data-pid' => $chapter->pid];
    $items[] = $item;
}
$menuItems = Tree::build($items, 'id', 'pid', 'items');
?>

<div class="am-container help">

<div class="am-u-md-3">
  	 <?= \common\widgets\SideNavWidget::widget([
            'items' => $menuItems,
        ]) ?>
  </div>
  
<div class="am-u-md-9">
  <div class="help-box-r">
  		      <?= $content ?>
   </div>
</div>
</div>

