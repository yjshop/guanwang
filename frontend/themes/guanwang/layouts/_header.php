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
</style>

<!-- 登录 -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
<div class="modal-content">





     <div class="site-login">

    <div class="row">
        <div class="col-lg-12">

             <form method="post" action="/user/security/login"  class="am-form am-form-horizontal">
               <!-- <div class="am-form-group">
                <label for="doc-ipt-3" class="col-sm-2 am-form-label">用户名</label>
                <div class="col-sm-10">
                  <input type="text" name="username" id="doc-ipt-3" placeholder="输入你的电子邮件">
                </div>
              </div>

              <div class="am-form-group">
                <label for="doc-ipt-pwd-2" class="col-sm-2 am-form-label">密码</label>
                <div class="col-sm-10">
                  <input type="password" name="password" id="doc-ipt-pwd-2" placeholder="设置一个密码吧">
                </div>
              </div>
              <div class="am-form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="rememberMe"> 记住我
                    </label>
                  </div>
                </div>
              </div> -->


    <div class="form-group">
    <label for="exampleInputEmail1">用户名/邮箱</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="请输入您的电子邮件或手机">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">密码</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="请输入您的密码" name="password">
  </div>

  <div class="checkbox">
    <label>
      <input type="checkbox"> 记住我
    </label>
  </div>
  <button type="submit" class="btn btn-primary">登录</button>

  <div class="login-footer">
  <p><a href="">忘记密码？</a></p>
  <p><a href="" data-toggle="modal" data-target="#signup">立即注册</a></p>
</div>








             </form>
            <?=\common\modules\user\widgets\AuthChoice::widget([
    'id'          => 'auth-login',
    'baseAuthUrl' => ['/user/security/auth'],
    'popupMode'   => true,
]);?>
        </div>
    </div>
</div>


    </div>
  </div>
</div>
<!-- 登录end -->





<!-- 注册 -->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
<div class="modal-content">



    <div class="site-signup">

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
                    <p class="signup-footer">&nbsp;&nbsp;已有帐号? <a href="/user/login">马上登录</a></p>
            </form>
        </div>
    </div>
</div>







  </div>
  </div>
</div>
<!-- 注册end -->














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
         <li><a href="" data-toggle="modal" data-target="#login">登录</a>/<a href="" data-toggle="modal" data-target="#signup">注册</a></li>






        </ul>

      </div>
    </div>
</header>
<!-- <div style="width: 100%;height: 80px;" class="am-hide-sm-only"></div> -->