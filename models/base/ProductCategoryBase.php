<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "product_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $detail
 * @property string $created_time
 * @property string $last_update
 *
 * @property ProductGroup[] $productGroups
 */
class ProductCategoryBase extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'product_category';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'code', 'created_time', 'last_update'], 'required'],
            [['detail'], 'string'],
            [['created_time', 'last_update'], 'safe'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductGroups() {
        return $this->hasMany(ProductGroupBase::className(), ['product_category_id' => 'id']);
    }

}
