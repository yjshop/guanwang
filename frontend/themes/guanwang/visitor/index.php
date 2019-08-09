<?php

use yii\helpers\Url;

?>

<div class="visitor-wrap">
    <div class="slide page-heading">
        <div class="container">
            <h3>域名授权中心</h3>
        </div>       
    </div>
 <div class="am-container">
   <div class="am-tabs" data-am-tabs>

    <ul class="am-tabs-nav am-nav am-nav-tabs">
    <li class="am-active"><a href="#tab1">授权查询</a></li>
    <li><a href="#tab2">套餐价格</a></li>
    <li><a href="#tab3">用户须知</a></li>
  </ul>


   <div class="am-tabs-bd">
      

  
   
   

    <div class="am-tab-panel am-fade  am-in am-active" id="tab1">
     
        <div id="web-mobile" class="slide services ">
      
            <div class="row">
                <div class="faq-header">
                    <h4 class="faq-title">授权查询</h4>
                </div>
            </div>

            <div class="row">
             <form action="" method="POST" class="ng-pristine ng-valid">
                        <div class="search-block m_20">
                            <div class="input-group input-group-lg">
                                <input name="domain" type="text" class="form-control" wt-autofocus="" value="" placeholder="请输入您要查询的域名或者小程序的ID">
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
                                <p>3、盗版程序有风险，使用需谨慎！<a href="<?= Url::to(['article/detail','id'=>79]); ?>" target="_blank">详情查看&gt;</a></p>
                                <?php else :?>
                                                               
                                 <p>您查询的内容是：<?= $domain ?><p>
                                 <p><?=$label?></p> 
                                 
                                <?php endif ; ?> 
                            </div>
                            
                        </div>
                    </form>   

            </div>
        
    </div>



    <h2 class="title2">为什么要授权</h2>

    <div class="am-g">
        <div class="am-u-md-6">

            <div class="am-panel am-panel-primary">
             <div class="am-panel-hd">商业授权用户</div>
            <div class="am-panel-bd">
           商业授权用户是由几何线电商系统商业运营授权许可证，经过认证后您将拥有商业授权的用户身份，并且享有使用几何线电商系统进行商业运营的合法权利。适合所有正在使用或将要使用几何线免费商城系统的网商用户选择！
            </div>
            </div>

        </div>

        <div class="am-u-md-6">
            
             <div class="am-panel am-panel-primary">
             <div class="am-panel-hd">非商业授权用户</div>
            <div class="am-panel-bd">
            未经几何线电商系统授权的用户，仅供从事学习研究之用，不具备商业运作的合法性，如果未获取授权而从事商业行为，几何线保留对其使用系统停止升级、关闭、甚至对其商业运作行为媒体曝光和追究法律责任的起诉权利。
            </div>
            </div>

        </div>

    </div>

     <h2 class="title2">享受授权五大优势</h2>



     <div class="am-g">
         <!--  <div class="am-u-md-6">永久授权</div>
           <div class="am-u-md-6">永久授权</div>
            <div class="am-u-md-6">永久授权</div>
             <div class="am-u-md-6">永久授权</div>
              <div class="am-u-md-6">永久授权</div> -->
<div class="am-u-md-12 visitor-advantage">
<button type="button" class="am-btn am-btn-primary am-btn-lg">主色按钮</button>
<button type="button" class="am-btn am-btn-secondary am-btn-lg">次色按钮</button>
<button type="button" class="am-btn am-btn-success am-btn-lg">绿色按钮</button>
<button type="button" class="am-btn am-btn-warning am-btn-lg">橙色按钮</button>
<button type="button" class="am-btn am-btn-danger am-btn-lg">红色按钮</button>


    </div>

 
 </div>

    </div>




  <div class="am-tab-panel am-fade am-in" id="tab2">
    
     <h2 class="title2">B2C单商户版</h2>

    <ul class="am-g price-list">
     

  <li class="col-sm-3 price-item">
    <div href="#" class="am-thumbnail">
     <div class="price-top">
         <h3>单商户免费版</h3>
         <h3>￥ 0</h3>
          <a class="am-btn am-btn-primary">免费下载</a>

     </div>
      <figcaption class="am-thumbnail-caption">
       <p style="color: red;font-weight: bold;">B2C基础功能</p> 
        <p style="color: red;font-weight: bold;">供学习研究，允许商用</p>
        <p>无技术支持服务</p>
        <p>无法升级授权版</p>
        <p>不允许二次开发</p>
        <p>不允许修改版权</p>
        <br/>
        <p style="border-top: 1px solid #ddd;padding-top: 10px;">
         <a href="" >功能列表</a>

         <a href="" style="float:right; color: #2b89ee;">联系客服</a>
        </p>
    </figcaption>
    </div>
  </li>

    <li class="col-sm-3 price-item">
    <div href="#" class="am-thumbnail">
     <div class="price-top">
         <h3>单商户标准版</h3>
         <h3>￥ 1980</h3>
          <a class="am-btn am-btn-primary">免费下载</a>

     </div>
      <figcaption class="am-thumbnail-caption">
       <p style="color: red;font-weight: bold;">B2C基础功能</p> 
        <p style="color: red;font-weight: bold;">供学习研究，允许商用</p>
        <p>无技术支持服务</p>
        <p>无法升级授权版</p>
        <p>不允许二次开发</p>
        <p>不允许修改版权</p>
        <br/>
        <p style="border-top: 1px solid #ddd;padding-top: 10px;">
         <a href="">功能列表</a>
          <a href="" style="float:right; color: #2b89ee;">联系客服</a>
        </p>
    </figcaption>
    </div>
  </li>

    <li class="col-sm-3 price-item">
    <div href="#" class="am-thumbnail">
     <div class="price-top">
         <h3>单商户企业版</h3>
         <h3>￥ 4980</h3>
          <a class="am-btn am-btn-primary">免费下载</a>

     </div>
      <figcaption class="am-thumbnail-caption">
       <p style="color: red;font-weight: bold;">B2C基础功能</p> 
        <p style="color: red;font-weight: bold;">供学习研究，允许商用</p>
        <p>无技术支持服务</p>
        <p>无法升级授权版</p>
        <p>不允许二次开发</p>
        <p>不允许修改版权</p>
        <br/>
        <p style="border-top: 1px solid #ddd;padding-top: 10px;">
         <a href="">功能列表</a>
          <a href="" style="float:right;color: #2b89ee;">联系客服</a>
        </p>
    </figcaption>
    </div>
  </li>
   
 
</ul>
         
</div>




















    <div class="am-tab-panel am-fade" id="tab3">
      我就这样告别山下的家，我实在不愿轻易让眼泪留下。我以为我并不差不会害怕，我就这样自己照顾自己长大。我不想因为现实把头低下，我以为我并不差能学会虚假。怎样才能够看穿面具里的谎话？别让我的真心散的像沙。如果有一天我变得更复杂，还能不能唱出歌声里的那幅画？
    </div>








   <div id="web-mobile" class="slide services ">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6"></div>
                <div class="col-xs-12 col-md-6"></div>
            </div>
        </div>
    </div>





</div>
</div>
</div>