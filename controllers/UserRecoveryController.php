<?php

/*

 */

namespace app\controllers;

/**
 * Description of UserRecoveryController
 *
 * @author Adsavin
 */
class UserRecoveryController extends \dektrium\user\controllers\RecoveryController {

    public function __construct($id, $module, \dektrium\user\Finder $finder, $config = array()) {
        parent::__construct($id, $module, $finder, $config);
    }

    public function actionRequest() {
        return parent::actionRequest();
    }

    public function actionReset($id, $code) {
        return parent::actionReset($id, $code);
    }

    public function behaviors() {
        parent::behaviors();
    }

}
