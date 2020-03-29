<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AssignQuizModel;

/**
 * ClassroomSearch represents the model behind the search form of `app\models\AssignQuizModel`.
 */
class AssignQuizSearch extends AssignQuizModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['classroom_id', 'quiz_id', 'quiz_type', 'minutes', 'enable_pause', 'subject_id', 'teacher_id', 'created_by'], 'integer'],
            [['start_time', 'end_time', 'created_time', 'updated_time'], 'safe'],
            [['instruction', 'description'], 'string'],
            [['quiz_title'], 'string', 'max' => 255],
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
        $query = AssignQuizModel::find();

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
            'classroom_id' => $this->classroom_id,
            'quiz_id' => $this->quiz_id,
            'quiz_type' => $this->quiz_type,
            'quiz_id' => $this->quiz_id,
            'enable_pause' => $this->enable_pause,
            'teacher_id' => $this->teacher_id,
            'subject_id' => $this->subject_id,
        ]);

        $query->andFilterWhere(['like', 'created_time', $this->created_time])
            ->andFilterWhere(['like', 'updated_time', $this->updated_time])
            ->andFilterWhere(['like', 'minutes', $this->minutes])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
