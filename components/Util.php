<?php

namespace app\components;

use Yii;

/**
 * Description of Util
 *
 * @author adsavin
 */
class Util {

    public static $LANGUAGES = [
        "lo" => 'ພາສາລາວ',
        "th" => 'พาษาไทย'
    ];
    public static $FLASH_LEVEL = [
        "success",
        "warning",
        "danger"
    ];

    public static function save($model) {
        if ($model->save()) {
            Yii::$app->session->setFlash("success", Yii::t('app', 'Completed'));
        } else {
            $error = "<ul>";
            if(YII_DEBUG) {
                foreach ($model->errors as $err) {
                    foreach ($err as $e) {
                        $error .= "<li>$e</li>";
                    }
                }
            }
            $error .= "</ul>";
            Yii::$app->session->setFlash("danger", Yii::t('app', 'Error').": ".$error);
        }
    }

    public static function createButton() {
        echo "<p>";
        echo Yii::$app->controller->action->id === "index" ? \yii\bootstrap\Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) : "";
        echo "</p>";
    }

    public static function selectColumnGridModal() {
//        return 
    }
}
