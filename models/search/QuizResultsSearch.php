<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\QuizResultsModel;

/**
 * QuizResultsSearch represents the model behind the search form of `app\models\QuizResultsModel`.
 */
class QuizResultsSearch extends QuizResultsModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'student_id', 'quiz_id', 'status', 'quiz_model', 'quiz_type'], 'integer'],
            [['quiz_taken', 'quiz_finish', 'grade_point'], 'safe'],
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
        $query = QuizResultsModel::find();

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
            'student_id' => $this->student_id,
            'quiz_id' => $this->quiz_id,
            'quiz_taken' => $this->quiz_taken,
            'quiz_finish' => $this->quiz_finish,
            'status' => $this->status,
            'quiz_model' => $this->quiz_model,
            'quiz_type' => $this->quiz_type,
        ]);

        $query->andFilterWhere(['like', 'grade_point', $this->grade_point]);

        return $dataProvider;
    }
}
