<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ApprovalRulesEdge;

/**
 * AppovalRulesEdgeSearch represents the model behind the search form of `app\models\ApprovalRulesEdge`.
 */
class AppovalRulesEdgeSearch extends ApprovalRulesEdge
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'parent_rules_node_id', 'child_rules_node_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = ApprovalRulesEdge::find();

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
            'id' => $this->id,
            'parent_rules_node_id' => $this->parent_rules_node_id,
            'child_rules_node_id' => $this->child_rules_node_id,
        ]);

        return $dataProvider;
    }
}
