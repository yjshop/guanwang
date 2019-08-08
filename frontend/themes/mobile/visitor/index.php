<?php

use yii\helpers\Url;

?>
    <div class="slide page-heading">
        <div class="container">
            <h3>域名授权中心</h3>
        </div>
    </div>
    <div id="web-mobile" class="slide services ">
        <div class="container">
            <div class="row">
                <div class="faq-header">
                    <h4 class="faq-title">授权查询</h4>
                </div>
            </div>
            <div class="row">
              
             <form action="" method="POST" class="ng-pristine ng-valid">
                        <div class="search-block m_20">
                            <div class="input-group input-group">
                                <input name="domain" type="text" class="form-control" wt-autofocus="" value="" placeholder="请输入要查询的域名或小程序的ID" style="font-size: 12px;">
                                <input name="_csrf" type="hidden" value="<?=yii::$app->request->csrfToken?>">
                                <span class="input-group-btn">
                                    <button class="btn btn-success" type="submit"> &nbsp;点击查询&nbsp; </button>
                                </span>
                            </div>
                               <div class="search-text warning">
                               <?php if(empty($label)):?>
                                <b>友情提示：</b>
                                <p>1、为了您的合法权益，请购买正版程序</p>
                                <p>2、购买正版授权，享受官方贴心服务，技术问题再无后顾之忧！</p>
                                <p>3、盗版程序有风险，使用需谨慎！<a href="<?= Url::to(['article/detail','id'=>79]) ?>" target="_blank">详情查看&gt;</a></p>
                                <?php else:?>
                                 <p><?=$label?></p>
                                <?php endif;?>
                            </div>
                            <!-- /input-group -->
                        </div>
                    </form>        
            </div>
        </div>
    </div>
    <div id="web-mobile" class="slide services ">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6"></div>
                <div class="col-xs-12 col-md-6"></div>
            </div>
        </div>
    </div>
    
<script type="text/javascript">

</script>