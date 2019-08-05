<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Markdown;

$this->title = $model->book_name;
$this->params['breadcrumbs'][] = ['label' => 'wiki', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->book_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Html::encode($model->book_name);
?>

<?php $this->beginContent('@common/modules/book/frontend/views/default/_layout.php', ['book' => $model]) ?>
<div class="view-title">
    <h1><?= Html::encode($model->firstChapter->chapter_name) ?></h1>
</div>
<div class="view-content"><?= HtmlPurifier::process(Markdown::process($model->firstChapter->chapter_body)) ?></div>
<!-- 评论   -->
 <!-- \frontend\widgets\comment\CommentWidget::widget(['model' =>$model->firstChapter])  -->
<?php $this->endContent() ?>
<?php $this->registerJs("$('.view-content a').attr('target', '_blank');") ?>