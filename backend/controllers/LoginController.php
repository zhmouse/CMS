<?php

namespace backend\controllers;

use Yii;

class LoginController extends \yii\web\Controller{

    public function init()
    {
        $this->enableCsrfValidation = false;
    }

    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'maxLength' => 4,
                'minLength' => 4,
                'width' => 120,
                'height' => 40,
            ],
        ];
    }

    /**
        $username   用户名
        $password   密码
        $code       验证码
     *  $message  1:账号或密码不正确    0:验证码错误
     **/
    public function actionIndex(){
        $request = Yii::$app->request;
        $username = $request->post('username');
        $password = md5($request->post('password')) ;
        $code = $request->post('code');
        if(empty($username) || empty($password) || empty($code)){
            return $this->renderPartial('index');
        }
        $model = new \app\models\Login();
        $info = $model->login($username,$password,$code);
        $message = '';
        if($info==0){
            $message = 0;
            return $this->renderPartial('index',['message'=>$message]);
        }elseif($info==1){
            $message = 1;
            return $this->renderPartial('index',['message'=>$message]);
        }elseif($info==2){
            $this->redirect(['home/index']);
        }



    }




}
