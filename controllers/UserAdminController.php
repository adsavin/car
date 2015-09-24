<?php

namespace app\controllers;

use dektrium\user\controllers\AdminController as BaseAdminController;
/**
 * Description of UserAdminController
 *
 * @author Adsavin
 */
class UserAdminController extends BaseAdminController {
    public function actionAssignments($id) {
        return parent::actionAssignments($id);
    }

    public function actionBlock($id) {
        return parent::actionBlock($id);
    }

    public function actionConfirm($id) {
        return parent::actionConfirm($id);
    }

    public function actionCreate() {
        return parent::actionCreate();
    }

    public function actionDelete($id) {
        return parent::actionDelete($id);
    }

    public function actionIndex() {        
        return parent::actionIndex();
    }

    public function actionInfo($id) {
        return parent::actionInfo($id);
    }

    public function actionUpdate($id) {
        return parent::actionUpdate($id);
    }

    public function actionUpdateProfile($id) {
        return parent::actionUpdateProfile($id);
    }

}
