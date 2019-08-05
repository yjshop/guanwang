<?php 
use common\helpers\Tree;
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
<div class="row">
    <div class="col-md-3">
        <?= \common\widgets\SideNavWidget::widget([
            'items' => $menuItems
        ]) ?>
    </div>
    <div class="col-md-9">
        <?= $content ?>
    </div>
</div>
