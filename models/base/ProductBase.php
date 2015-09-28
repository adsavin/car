<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $name
 * @property integer $product_group_id
 * @property string $code
 * @property string $detail
 * @property string $created_time
 * @property string $last_update
 * @property integer $user_id
 * @property integer $product_unit_id
 *
 * @property PriceLog[] $priceLogs
 * @property ProductGroup $productGroup
 * @property User $user
 * @property ProductUnit $productUnit
 * @property ProductImage[] $productImages
 * @property ProductSerial[] $productSerials
 */
class ProductBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'product_group_id', 'code', 'created_time', 'last_update', 'user_id', 'product_unit_id'], 'required'],
            [['product_group_id', 'user_id', 'product_unit_id'], 'integer'],
            [['detail'], 'string'],
            [['created_time', 'last_update'], 'safe'],
            [['name', 'code'], 'string', 'max' => 255],
            [['code'], 'unique']
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
            'product_group_id' => Yii::t('app', 'Product Group ID'),
            'code' => Yii::t('app', 'Code'),
            'detail' => Yii::t('app', 'Detail'),
            'created_time' => Yii::t('app', 'Created Time'),
            'last_update' => Yii::t('app', 'Last Update'),
            'user_id' => Yii::t('app', 'User ID'),
            'product_unit_id' => Yii::t('app', 'Product Unit ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPriceLogs()
    {
        return $this->hasMany(PriceLog::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductGroup()
    {
        return $this->hasOne(ProductGroup::className(), ['id' => 'product_group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductUnit()
    {
        return $this->hasOne(ProductUnit::className(), ['id' => 'product_unit_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductImages()
    {
        return $this->hasMany(ProductImage::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductSerials()
    {
        return $this->hasMany(ProductSerial::className(), ['product_id' => 'id']);
    }
}
