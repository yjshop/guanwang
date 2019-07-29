<?php
?>
<div class="am-u-md-3">
  	<div class="help-box-l">
  		<ul class="">
        <li>
				  <a href="javascript:;"><i class="iconfont icon-zhidao"></i>入门指导<span class="iconfont icon-dayuhao"></span></a>
				  <ul class="child" style="display:block">
  				  <li><a href="/index/help/id/72.html" style="color:#31b3a4;background-color:#f5f5f5">系统操作教程</a></li>  				  </ul>
  			   </li><li>
				  <a href="javascript:;"><i class="iconfont icon-zhidao"></i>微信<span class="iconfont icon-dayuhao"></span></a>
				  <ul class="child" style="display:block">
  				  <li><a href="/index/help/id/74.html" style="">小程序</a></li><li><a href="/index/help/id/75.html" style="">公众号</a></li>  				  </ul>
  	    </li>  		
  	    </ul>
  	</div>
  </div>

<?php  
$this->registerJs(<<<JS
      

      $(".help-box-l>ul>li a").click(function(){
        if($(this).next().is(":hidden")){
          $(this).next().slideDown();
          $(this).find(".icon-dayuhao").css({"transform":"rotate(180deg)","-webkit-transform":"rotate(180deg)"});
        }else{
          $(this).next().slideUp();
          $(this).find(".icon-dayuhao").css({"transform":"rotate(360deg)","-webkit-transform":"rotate(360deg)"});
        }
      })
JS
); 
?>