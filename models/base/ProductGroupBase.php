<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "product_group".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $detail
 * @property string $created_time
 * @property string $last_update
 * @property integer $product_category_id
 *
 * @property Product[] $products
 * @property ProductCategory $productCategory
 */
class ProductGroupBase extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'product_group';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'code', 'created_time', 'last_update', 'product_category_id'], 'required'],
            [['detail'], 'string'],
            [['created_time', 'last_update'], 'safe'],
            [['product_category_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 50],
            [['code'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'code' => Yii::t('app', 'Code'),
            'detail' => Yii::t('app', 'Detail'),
            'created_time' => Yii::t('app', 'Created Time'),
            'last_update' => Yii::t('app', 'Last Update'),
            'product_category_id' => Yii::t('app', 'Product Category ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts() {
        return $this->hasMany(ProductBase::className(), ['product_group_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategory() {
        return $this->hasOne(ProductCategoryBase::className(), ['id' => 'product_category_id']);
    }

}
