<?php

namespace app\controllers;

use Yii;

/**
 * Description of UserSecurityController
 *
 * @author Adsavin
 */
class UserSecurityController extends \dektrium\user\controllers\SecurityController {

    public function init() {
        parent::init();
        $cookies = Yii::$app->request->cookies;
        if ($cookies->has("language")) {
            Yii::$app->language = $cookies->getValue('language');
        }
    }

    public function actions() {
        return array_merge(parent::actions(), [
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'oAuthSuccess'],
            ],
        ]);
    }

    /**
     * This function will be triggered when user is successfuly authenticated using some oAuth client.
     *
     * @param yii\authclient\ClientInterface $client
     * @return boolean|yii\web\Response
     */
    public function oAuthSuccess($client) {
        // get user data from client
//        $client->getName();
        $userAttributes = $client->getUserAttributes();
//        print_r($client);
//        echo "<hr>";
//        print_r($userAttributes);
//        exit;
        // do some thing with user data. for example with $userAttributes['email']
        $socialaccount = \app\models\SocialAccount::find()->where("client_id=:id", [":id" => $userAttributes["id"]])->one();
        if ($socialaccount) {
//            print_r($socialaccount);
//            exit;
//            print_r($socialaccount->getUser());exit;
            \Yii::$app->getUser()->login($socialaccount->getUser()->one(), 0);
            \Yii::$app->session->setFlash("success", \Yii::t('app', 'Welcome'));
        } else {
            $user = \app\models\User::find()->where("email=:email", [":email" => $userAttributes["email"]])->one();
            if ($user) {
                $socialaccount = new \app\models\SocialAccount();
                $socialaccount->user_id = $user->id;
                $socialaccount->provider = "facebook";
                $socialaccount->client_id = $userAttributes["id"];
                $socialaccount->data = json_encode($userAttributes);
                $socialaccount->save();
                \Yii::$app->session->setFlash("success", \Yii::t('app', 'Facebook is connected successfully'));
            }
        }
        echo "<script>
            window.opener.location.reload();
            window.close();
            </script>";        
        exit;
    }

    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            $this->goHome();
        }

        $model = \Yii::createObject(\app\models\LoginForm::className());
        $this->performAjaxValidation($model);

        if ($model->load(Yii::$app->getRequest()->post()) && $model->login()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Welcome') . " " . Yii::$app->user->identity->username);
//            $this->goHome();
            return $this->goBack();
        }

        return $this->render('login', [
                    'model' => $model,
                    'module' => $this->module,
        ]);
    }

}
