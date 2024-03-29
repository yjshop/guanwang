<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Markdown;

$this->title = $model->chapter_name;
$this->params['breadcrumbs'][] = ['label' => '帮助文档', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->book->book_name, 'url' => ['view', 'id' => $model->book->id]];
$this->params['breadcrumbs'][] = Html::encode($model->chapter_name);
?>

<?php $this->beginContent('@common/modules/book/frontend/views/default/_layout.php', ['book' => $model->book]) ?>
<div class="view-title">
    <h1><?= Html::encode($model->chapter_name) ?></h1>
</div>
<div class="view-content"><?= HtmlPurifier::process(Markdown::process($model->chapter_body)) ?></div>
<!-- 评论   -->

<!--  \frontend\widgets\comment\CommentWidget::widget(['model' => $model]) -->
<?php $this->endContent() ?>
<?php $this->registerJs("$('.view-content a').attr('target', '_blank');") ?>