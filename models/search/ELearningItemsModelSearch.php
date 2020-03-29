<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ELearningItemsModel;

/**
 * ELearningItemsModelSearch represents the model behind the search form of `app\models\ELearningItemsModel`.
 */
class ELearningItemsModelSearch extends ELearningItemsModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'elearning_id', 'status', 'created_by'], 'integer'],
            [['chapter', 'content', 'description', 'created_time', 'elearning_type', 'cover_image'], 'safe'],
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
        $query = ELearningItemsModel::find();

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
            'elearning_id' => $this->elearning_id,
            'status' => $this->status,
            'created_time' => $this->created_time,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'chapter', $this->chapter])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'elearning_type', $this->elearning_type])
            ->andFilterWhere(['like', 'cover_image', $this->cover_image]);

        return $dataProvider;
    }
}
