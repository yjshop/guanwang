<?php
?>
<!-- 主体 -->
<div class="faq-wrap">
    <div class="slide page-heading">
        <div class="container">
            <h3>我们致力于帮助客户解决市场需求的步伐从未停止过</h3>
        </div>
    </div>




<div class="am-container">
      <div class="row">
                <div class="faq-header">
                    <h4 class="faq-title">常见问题</h4>
                </div>
            </div>

 <div class="am-tabs" data-am-tabs>

    <ul class="am-tabs-nav am-nav am-nav-tabs">
    <li class="am-active"><a href="#tab1">小程序</a></li>
    <li><a href="#tab2">微商城</a></li>
    <li><a href="#tab3">单商户</a></li>
    <li><a href="#tab4">多商户</a></li>
     <li><a href="#tab5">三级分销</a></li>
  </ul>

   <div class="am-tabs-bd">


  <!-- 选项卡 -->
      <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                <div id="web-mobile" class="slide services ">
       
          
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



 <!-- 选项卡 -->
         <div class="am-tab-panel am-fade" id="tab2">
     2
    </div>

 <!-- 选项卡 -->
   <div class="am-tab-panel am-fade" id="tab3">
    3
    </div>


 <!-- 选项卡 -->
     <div class="am-tab-panel am-fade" id="tab4">
        4
     </div>


 <!-- 选项卡 -->
      <div class="am-tab-panel am-fade" id="tab5">
        5
      </div>


   </div>
</div>






    <div id="web-mobile" class="slide services ">
    </div>

    </div>
    </div>
