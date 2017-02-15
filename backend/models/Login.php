<?php
namespace app\models;

use Yii;
use yii\base\Model;

class Login extends Model{

    /*返回值说明
     * 0    验证码错误
     * 1    用户名或密码错误
     * 2    成功
     * */
    public function login($username,$password,$code){
        //验证验证码
        $vcode = new \yii\captcha\CaptchaValidator();
        $vcode->captchaAction = 'login/captcha';
        $vaction = $vcode->createCaptchaAction();
        $scode = $vaction->getVerifyCode();
        if($code != $scode){
            return 0;
        }
        //验证用户名&&密码
        $user = User::find()->where(':uname = uname And :password = password',['uname' => $username ,'password'=>$password])->asArray()->one();
        if(!$user){
            return 1;
        }
        $session = Yii::$app->session;
        $session->set('userinfo',$user);
        return 2;
    }


}