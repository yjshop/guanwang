
    <?php
?>
<!-- 主体 -->

    <div class="slide page-heading">
        <div class="container">
            <h3>我们致力于帮助客户解决市场需求的步伐从未停止过</h3>
        </div>
    </div>
    <div id="web-mobile" class="slide services ">
        <div class="container">
            <div class="row">
                <div class="faq-header">
                    <h4 class="faq-title">常见问题</h4>
                </div>
            </div>
            <div class="row">
               <?php foreach ($help as $mun): ?>
                <div class="faq-question"><?= $mun['title'] ?></div>
                <div class="faq-answer">
                    <img src="\storage\images\faq-answer.png">
                    <?= $mun['content'] ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div id="web-mobile" class="slide services ">
    </div>