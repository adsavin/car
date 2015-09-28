<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductSerial;

/**
 * ProductSerialSearch represents the model behind the search form about `app\models\ProductSerial`.
 */
class ProductSerialSearch extends ProductSerial
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'product_id'], 'integer'],
            [['serial_no'], 'safe'],
            [['price'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ProductSerial::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'product_id' => $this->product_id,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'serial_no', $this->serial_no]);

        return $dataProvider;
    }
}
