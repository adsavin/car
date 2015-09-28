<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "product_image".
 *
 * @property integer $id
 * @property string $name
 * @property string $last_update
 * @property integer $product_id
 *
 * @property Product $product
 */
class ProductImageBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'product_id'], 'required'],
            [['id', 'product_id'], 'integer'],
            [['last_update'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'last_update' => Yii::t('app', 'Last Update'),
            'product_id' => Yii::t('app', 'Product ID'),
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
