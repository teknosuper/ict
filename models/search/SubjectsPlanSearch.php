<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SubjectsPlanModel;

/**
 * SubjectsPlanSearch represents the model behind the search form of `app\models\SubjectsPlanModel`.
 */
class SubjectsPlanSearch extends SubjectsPlanModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'subject_id', 'parent_id'], 'integer'],
            [['chapter', 'cover_image', 'learning_objective'], 'safe'],
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
        $query = SubjectsPlanModel::find();

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
            'subject_id' => $this->subject_id,
            'parent_id' => $this->parent_id,
        ]);

        $query->andFilterWhere(['like', 'chapter', $this->chapter])
            ->andFilterWhere(['like', 'cover_image', $this->cover_image])
            ->andFilterWhere(['like', 'learning_objective', $this->learning_objective]);

        return $dataProvider;
    }
}
