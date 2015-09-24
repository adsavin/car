<?php

/*

 */

namespace app\controllers;

/**
 * Description of UserProfileController
 *
 * @author Adsavin
 */
class UserProfileController extends \dektrium\user\controllers\ProfileController {

    public function __construct($id, $module, \dektrium\user\Finder $finder, $config = array()) {
        parent::__construct($id, $module, $finder, $config);
    }

    public function actionIndex() {
        return parent::actionIndex();
    }

    public function actionShow($id) {
        return parent::actionShow($id);
    }

    public function behaviors() {
        parent::behaviors();
    }

}
