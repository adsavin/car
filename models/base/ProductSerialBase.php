<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "product_serial".
 *
 * @property integer $id
 * @property string $serial_no
 * @property integer $product_id
 * @property double $price
 *
 * @property Product $product
 */
class ProductSerialBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_serial';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['serial_no', 'product_id', 'price'], 'required'],
            [['product_id'], 'integer'],
            [['price'], 'number'],
            [['serial_no'], 'string', 'max' => 255],
            [['serial_no'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'serial_no' => Yii::t('app', 'Serial No'),
            'product_id' => Yii::t('app', 'Product ID'),
            'price' => Yii::t('app', 'Price'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
