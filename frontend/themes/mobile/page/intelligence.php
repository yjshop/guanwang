<?php
?>
<?php echo $this->render('top'); ?>

<div class="am-container layout">

  <div class="am-g">
  <?php echo $this->render('left',['show'=>$show]); ?>
  
      <div class="am-u-md-10 lay-r" style="padding:30px 50px;">
    <div class="am-slider am-slider-default am-slider-carousel slider">
      
    <div class="am-viewport" style="overflow: hidden; position: relative;"><ul class="am-slides" style="width: 600%; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
        <li style="width: 300px; margin-right: 20px; float: left; display: block;"><img src="/storage/images/zizhi03.jpg" draggable="false"></li>
        <li style="width: 300px; margin-right: 20px; float: left; display: block;"><img src="/storage/images/zizhi02.jpg" draggable="false"></li>
        <li style="width: 300px; margin-right: 20px; float: left; display: block;"><img src="/storage/images/zizhi01.jpg" draggable="false"></li>
      </ul>
     </div>
     </div>
      </div>
  </div>
</div>





<!-- Js -->
   <!--    $(".help-box-l>ul>li a").click(function(){
        if($(this).next().is(":hidden")){
          $(this).next().slideDown();
          $(this).find(".icon-dayuhao").css({"transform":"rotate(180deg)","-webkit-transform":"rotate(180deg)"});
        }else{
          $(this).next().slideUp();
          $(this).find(".icon-dayuhao").css({"transform":"rotate(360deg)","-webkit-transform":"rotate(360deg)"});
        }
      })
 -->