<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html><html>
<head>
<title>后台管理系统</title>

<!-- 页面基本设置禁止随意更改 -->
<meta charset="utf-8">
<meta name="author" content="forework">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="msapplication-tap-highlight" content="no">
<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
<!-- 页面基本设置禁止随意更改 -->
<!-- 基础CSS类库可随意更改 -->
<link rel="stylesheet" type="text/css" href="statics/css/less.css">
<link rel="stylesheet" type="text/css" href="statics/css/basic.css">
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="statics/css/ie8.css">
<![endif]-->
<!--[if gte IE 9]> 
<link rel="stylesheet" type="text/css" href="statics/css/ie.css">
<![endif]-->
<!-- 基础CSS类库可随意更改 -->
<!-- 基础js类库可随意更改 -->

<!-- 基础js类库可随意更改 -->
</head>
<body id="loginbg">
<?php $this->beginBody() ?>
     <div class="login-topStyle" >
          <!--在点击注册时出现样式login-topStyle3登录框，而login-topStyle2则消失-->
          <h3 class="login_title">系统管理登录</h3>

          <div class="login-topStyle3" id="loginStyle">
            
            <!--输入错误提示信息，默认是隐藏的，把display:none，变成block可看到-->
            <?php if(isset($message) && $message==1 ){?>
            <div class="error-information" style="color: red">您输入的账号或密码不正确</div>
            <?php }?>
              <form name="login" action="<?php echo \yii\helpers\Url::to(['login/index']) ?>" method="post">
            <div class="ui-form-item loginUsername">
              <input type="username" placeholder="请输入用户名" name="username">
            </div>
            <div class="ui-form-item loginPassword">
              <input type="password" placeholder="请输入密码" name="password">
            </div>
            <div class="field clearfix">    
                <input  class=" float_l width_a1 "   type="text" placeholder="验证码" name="code" >


                <?= \yii\captcha\Captcha::widget([
//                    'model' => $model,
//                    'attribute' => 'code',
                    'name' => 'captcha',
                    'captchaAction' =>'login/captcha',
                    'template' => '{image}',
                    'options' => [
                        'style' => 'width:120px;height:34px',
                        'class' => 'has-padding has-border',
                        'id' => 'verifyCode' ,
                    ],'imageOptions' => [
                        'style' => 'cursor:pointer',
                        'class' => 'code',
                        'id' => 'verifyCode-image' ,
                        'alt' => '点击更换验证码'
                    ]

                ]) ?>

            </div>
            <?php if(isset($message) && $message==0){?>
            <span class="error_xinxi" style="color: red">验证码错误</span>
            <?php }?>
            <input type="submit" class="btnStyle btn-register"  value="登录"/>
              </form>
          </div>

     </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>