<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SimulationModel;

/**
 * SimulationSearch represents the model behind the search form of `app\models\SimulationModel`.
 */
class SimulationSearch extends SimulationModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'subjects_plan_id', 'created_by'], 'integer'],
            [['title', 'file_html', 'description', 'created_time'], 'safe'],
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
        $query = SimulationModel::find();

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
            'subjects_plan_id' => $this->subjects_plan_id,
            'created_by' => $this->created_by,
            'created_time' => $this->created_time,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'file_html', $this->file_html])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
