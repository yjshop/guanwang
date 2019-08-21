<?php
/**
 * @var \yii\web\View $this
 */
?>

<style type="text/css">
    .mgt7{margin-top: 7px;}
    .mgt10{margin-top: 10px;}
    .navbar-right li a {padding-bottom: 0;}
    .l-text{margin-top: 6px;}


    .modal.fade.in{
        top:100px;  

    }
     .modal.fade1.in{
        top:200px;
     }
</style>




<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-sm" role="document" style="width: 350px;">
<div class="modal-content">


<ul class="nav nav-tabs nav-justified">
  <li ><a href="#qr-login"  data-toggle="tab">扫码登录/注册</a></li>
    <li ><a href="#site-login"  data-toggle="tab">手机号登录/注册</a></li>

    <!-- <li><a href="#site-signup"  data-toggle="tab"> 注册</a></li> -->
</ul>



<div class="tab-content">

    <!-- 二维码登录 -->
    <div class="qr-login  tab-pane fade in active" id="qr-login">
        <div class="row">
            <div class="col-lg-12">
                <h3>二维码登录</h3>
                <p>请用微信扫一扫登录</p>
                <img src="" alt="二维码">
                <p style="color: rgb(153, 153, 153); margin-top: 20px;">其他登录方式</p>
                <p><a href="#" id="login-other">手机号登录</a></a></p>

            </div> 
        </div>
    </div>

    <!-- 帐号登录 -->
     <div class="site-login  tab-pane fade in " id="site-login">

    <div class="row">
        <div class="col-lg-12">

             <form method="post" action="/user/security/login"  class="am-form am-form-horizontal">


    <div class="form-group">
    <label for="exampleInputEmail1">手机号</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="请输入您的电子邮件或手机">
  </div>



 <div class="form-group">
 <label for="exampleInputPassword1">验证码</label>
  <div class="input-group">

  <input type="text" class="form-control" placeholder="请输入短信验证码">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button" data-toggle="modal" data-target="#verification">获取验证码</button>
      </span>
    </div>
</div>

 
  <button type="submit" class="btn btn-primary" style="margin-top: 20px;">登录</button>

             </form>
            <?=\common\modules\user\widgets\AuthChoice::widget([
    'id'          => 'auth-login',
    'baseAuthUrl' => ['/user/security/auth'],
    'popupMode'   => true,
]);?>
        </div>
    </div>
</div>

<!-- 登录end -->



<!-- 注册 -->


<!--     <div class="site-signup tab-pane fade" id="site-signup">

    <div class="row">
        <div class="col-lg-12">
    <form id="form-signup" action="/user/signup" method="post">
<input type="hidden" name="_csrf" value="4mg_L5F0GzWcvX2-sSVuyM3QSudvJpOUKvHJV9_sH0GkAU1s8EJuQ6_WTtWDFTb8hqF71Q10osVjxP96u5ROdA==">

                <div class="form-group field-signupform-username required has-success">

<label class="control-label" for="signupform-username">用户名</label>
<input type="text" id="signupform-username" class="form-control" name="SignupForm[username]" aria-required="true" aria-invalid="false">

<p class="help-block help-block-error"></p>
</div>

                <div class="form-group field-signupform-email required has-error">
<label class="control-label" for="signupform-email">邮箱</label>
<input type="text" id="signupform-email" class="form-control" name="SignupForm[email]" aria-required="true" aria-invalid="true">

<p class="help-block help-block-error">邮箱不能为空。</p>
</div>

                <div class="form-group field-signupform-password required has-success">
<label class="control-label" for="signupform-password">密码</label>
<input type="password" id="signupform-password" class="form-control" name="SignupForm[password]" aria-required="true" aria-invalid="false">

<p class="help-block help-block-error"></p>
</div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="signup-button">注册</button>
                    
                </div>
                    <p class="signup-footer">已有帐号? <a href="#"  id="login-im">马上登录</a></p>
            </form>
        </div>
    </div>
</div>
 -->




<!-- 注册end -->
    </div>
  </div>
  </div>
</div>



<!-- 滑动验证码 -->
<div class="modal fade1" id="verification" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" style="width: 320px;">
        <div class="modal-content">
            <!-- <div class="modal-header">
               
                <h4 class="modal-title" id="myModalLabel">滑动验证</h4>
            </div> -->
            <div id="verify"></div>
            <p id="verify-msg" style="margin-top:10px;text-align: center;"></p>
           
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- 滑动验证码end -->




















   <!-- 头部 -->
    <header class="am-topbar am-topbar-fixed-top">
    <div class="am-container bg-f8">
        <h1 class="am-topbar-brand"><img src="<?=yii::$app->config->get('site_logo')?>" alt="几何线系统" class="am-img-responsive"></h1>
      <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: &#39;#doc-topbar-collapse&#39;}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>
      <div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse">


        <ul class="am-nav am-nav-pills am-topbar-nav mgt7">

          <li class="am-active"><a href="/">首页</a></li>
          <li><a href="/site/product">产品中心</a></li>
         <li><a href="/site/#">源码</a></li>
         <li><a href="/visitor">授权</a></li>
         <li><a href="/cases">成功案例</a></li>
         <li><a href="/book/default/index">帮助文档</a></li>
         <li><a href="/article?cate=study">新闻中心</a></li>
         <li><a href="/page/slug?slug=aboutus">关于我们</a></li>
         <li><a href="" data-toggle="modal" data-target="#login" id="btn-login">登录</a>/<a href="" data-toggle="modal" data-target="#login" id="btn-signup">注册</a></li>
        </ul>


      </div>
    </div>
</header>
<!-- <div style="width: 100%;height: 80px;" class="am-hide-sm-only"></div> -->


<?php
$this->registerJs(<<<JS



    //导航登录按钮
$('#btn-login').click(function(){
    $('a[href="#qr-login"]').tab('show')
     
    })

//导航注册按钮
$('#btn-signup').click(function(){
   

     $(' a[href="#site-login"]').tab('show')

        
    })



$('#login-other').click(function(){

     $('a[href="#site-login"]').tab('show')

    })




 jigsaw.init(document.getElementById('verify'), function () {
    document.getElementById('verify-msg').innerHTML = '登录成功！'
    setTimeout(function (){
         $("#verification").modal('hide');

        }, 1000)

  })



JS
);
?>