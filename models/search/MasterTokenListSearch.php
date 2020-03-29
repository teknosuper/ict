<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MasterTokenListModel;

/**
 * MasterTokenListSearch represents the model behind the search form of `app\models\MasterTokenListModel`.
 */
class MasterTokenListSearch extends MasterTokenListModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'access_token_status', 'createdUserId', 'updatedUserId', 'deletedUserId', 'is_limit'], 'integer'],
            [['access_token', 'usedTime', 'token_type', 'source', 'authurl', 'createdTime', 'updatedTime', 'deletedTime', 'key', 'error_message', 'next_limit_time', 'quota_remaining', 'error_code'], 'safe'],
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
        $query = MasterTokenListModel::find();

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
            'usedTime' => $this->usedTime,
            'access_token_status' => $this->access_token_status,
            'createdTime' => $this->createdTime,
            'createdUserId' => $this->createdUserId,
            'updatedTime' => $this->updatedTime,
            'updatedUserId' => $this->updatedUserId,
            'deletedTime' => $this->deletedTime,
            'deletedUserId' => $this->deletedUserId,
            'next_limit_time' => $this->next_limit_time,
            'is_limit' => $this->is_limit,
        ]);

        $query->andFilterWhere(['like', 'access_token', $this->access_token])
            ->andFilterWhere(['like', 'token_type', $this->token_type])
            ->andFilterWhere(['like', 'source', $this->source])
            ->andFilterWhere(['like', 'authurl', $this->authurl])
            ->andFilterWhere(['like', 'key', $this->key])
            ->andFilterWhere(['like', 'error_message', $this->error_message])
            ->andFilterWhere(['like', 'quota_remaining', $this->quota_remaining])
            ->andFilterWhere(['like', 'error_code', $this->error_code]);

        return $dataProvider;
    }
}
