<?php

namespace common\models\OrderedItem;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\OrderedItem\OrderedItem;

/**
 * OrderedItemSearch represents the model behind the search form about `common\models\OrderedItem\OrderedItem`.
 */
class OrderedItemSearch extends OrderedItem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ordered_id', 'item_id'], 'integer'],
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
        $query = OrderedItem::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ordered_id' => $this->ordered_id,
            'item_id' => $this->item_id,
        ]);

        return $dataProvider;
    }
}
