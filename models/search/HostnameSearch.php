<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\HostnameClass;

/**
 * HostnameSearch represents the model behind the search form of `app\models\HostnameClass`.
 */
class HostnameSearch extends HostnameClass
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['host', 'host_description', 'host_template', 'host_logo'], 'safe'],
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
        $query = HostnameClass::find();

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
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'host', $this->host])
            ->andFilterWhere(['like', 'host_description', $this->host_description])
            ->andFilterWhere(['like', 'host_template', $this->host_template])
            ->andFilterWhere(['like', 'host_logo', $this->host_logo]);

        return $dataProvider;
    }
}
