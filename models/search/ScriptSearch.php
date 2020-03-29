<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ScriptClass;

/**
 * ScriptSearch represents the model behind the search form of `app\models\ScriptClass`.
 */
class ScriptSearch extends ScriptClass
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'master_script_hostname_id', 'master_script_order', 'master_script_status'], 'integer'],
            [['master_script_name', 'master_script_slug', 'master_script_by_tag_location', 'master_script_by_tag_location_position', 'master_script_code', 'master_script_platform_type', 'created_time', 'updated_time'], 'safe'],
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
        $query = ScriptClass::find();

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
            'master_script_hostname_id' => $this->master_script_hostname_id,
            'master_script_order' => $this->master_script_order,
            'master_script_status' => $this->master_script_status,
            'created_time' => $this->created_time,
            'updated_time' => $this->updated_time,
        ]);

        $query->andFilterWhere(['like', 'master_script_name', $this->master_script_name])
            ->andFilterWhere(['like', 'master_script_slug', $this->master_script_slug])
            ->andFilterWhere(['like', 'master_script_by_tag_location', $this->master_script_by_tag_location])
            ->andFilterWhere(['like', 'master_script_by_tag_location_position', $this->master_script_by_tag_location_position])
            ->andFilterWhere(['like', 'master_script_code', $this->master_script_code])
            ->andFilterWhere(['like', 'master_script_platform_type', $this->master_script_platform_type]);

        return $dataProvider;
    }
}
