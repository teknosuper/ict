<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\QuizItemsOptionsModel;

/**
 * QuizItemsOptionsSearch represents the model behind the search form of `app\models\QuizItemsOptionsModel`.
 */
class QuizItemsOptionsSearch extends QuizItemsOptionsModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'quiz_item_id', 'is_correct_answer'], 'integer'],
            [['option', 'value'], 'safe'],
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
        $query = QuizItemsOptionsModel::find();

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
            'quiz_item_id' => $this->quiz_item_id,
            'is_correct_answer' => $this->is_correct_answer,
        ]);

        $query->andFilterWhere(['like', 'option', $this->option])
            ->andFilterWhere(['like', 'value', $this->value]);

        return $dataProvider;
    }
}
