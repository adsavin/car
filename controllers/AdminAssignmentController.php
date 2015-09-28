<?php


namespace app\controllers;
use mdm\admin\controllers\AssignmentController as BaseAssignment;
/**
 * Description of AssignmentController
 *
 * @author Adsavin
 */
class AdminAssignmentController extends BaseAssignment {
    
    public function actionIndex() {            
        return parent::actionIndex();
    }

}
