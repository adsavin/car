<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\ContactForm;

class SiteController extends Controller {

//    public $layout = "common";

    public function init() {
        parent::init();
        $cookies = Yii::$app->request->cookies;
        if ($cookies->has("language")) {
            Yii::$app->language = $cookies->getValue('language');
        }
    }

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post())) {
            $model->contact(Yii::$app->params['adminEmail']);
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

    public function actionAbout() {
        return $this->render('about');
    }

    public function actionSwitchlang() {
        $get = Yii::$app->request->get();
        $cookies = Yii::$app->response->cookies; // add a new cookie to the response to be sent
        $cookies->add(new \yii\web\Cookie([
            'name' => 'language',
            'value' => $get[1]['lang'],
        ]));

        if (Yii::$app->request->referrer) {
            return $this->redirect(Yii::$app->request->referrer);
        } else {
            return $this->goHome();
        }
    }

    public function actionPdf() {                
        $mpdf = new \mPDF("lo"); //mPDF($mode='',$format='A4',$default_font_size=0,$default_font='',$mgl=15,$mgr=15,$mgt=16,$mgb=16,$mgh=9,$mgf=9, $orientation='P')        
        $mpdf->WriteHTML("<style>" . file_get_contents("bootstrap/css/bootstrap.css") . "</style>");
        $mpdf->WriteHTML("<style>" . file_get_contents("css/site.css") . "</style>");
//        $mpdf->FontFamily = 'Saysettha OT';
//        $mpdf->fontlist="Saysettha OT";
//        $mpdf->fonts = "Phetsarath_OT.ttf";
        $mpdf->WriteHTML($this->renderPartial('index'));
        $mpdf->Output('MyPDF.pdf', 'I');
        exit;
    }

}
