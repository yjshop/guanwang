<?php
use yii\helpers\Url;
?>
     <div class="am-u-md-2 lay-l">
        <ul>
          <li><a class="<?php if ($show == 'aboutus'):{$a = 'active';} echo $a;?><?php endif; ?>" href="<?= Url::to(['page/slug','slug'=>'aboutus'])?>"><i class="iconfont icon-gongsixinxi1"></i>公司介绍</a></li>
          
          <li><a class="<?php if ($show == 'one'):{$a = 'active';} echo $a;?> <?php endif; ?>" href="<?= Url::to(['page/intelligence']) ?>"><i class="iconfont icon-zizhi"></i>公司资质</a></li>
          
<!--           <li><a href="zhaopin.html"><i class="iconfont icon-rencaizhaopin1"></i>人才招聘</a></li> -->

          <li><a class="<?php if ($show == 'two'):{$a = 'active';} echo $a;?><?php endif; ?>" href="<?= Url::to(['page/call']) ?>"><i class="iconfont icon-lianxiwomen"></i>联系我们</a></li>
        </ul>
      </div>
      
<!-- active -->