<?php

namespace app\models;

/**
 * Description of ProductCategory
 *
 * @author adsavin
 */
class ProductCategory extends base\ProductCategoryBase {
    public function beforeValidate() {
        if($this->isNewRecord) {
            $this->created_time = $this->last_update;
        }
        return parent::beforeValidate();
    }

}
