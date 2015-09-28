<?php

namespace app\models;

/**
 * Description of ProductGroup
 *
 * @author adsavin
 */
class ProductGroup extends base\ProductGroupBase {

//    public function beforeValidate() {        
//        return parent::beforeValidate();
//    }

    public function rules() {
        return array_merge(
                parent::rules(), [
            [['name', 'code', 'created_time', 'last_update', 'product_category_id'], 'required'],
            [['detail'], 'string'],
            [['created_time', 'last_update'], 'safe'],
            [['product_category_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 50],
            [['code'], 'unique']
        ]);
    }

}
