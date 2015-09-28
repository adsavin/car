<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductGroup;

/**
 * ProductGroupSearch represents the model behind the search form about `app\models\ProductGroup`.
 */
class ProductGroupSearch extends ProductGroup
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'product_category_id'], 'integer'],
            [['name', 'code', 'detail', 'created_time', 'last_update'], 'safe'],
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
        $query = ProductGroup::find();

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
            'created_time' => $this->created_time,
            'last_update' => $this->last_update,
            'product_category_id' => $this->product_category_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'detail', $this->detail]);

        return $dataProvider;
    }
}
