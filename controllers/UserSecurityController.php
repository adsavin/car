<?php

namespace app\controllers;

use Yii;

/**
 * Description of UserSecurityController
 *
 * @author Adsavin
 */
class UserSecurityController extends \dektrium\user\controllers\SecurityController {

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
