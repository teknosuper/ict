<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AssignClassroomTeacherModel;

/**
 * ClassroomTeacherSearch represents the model behind the search form of `app\models\AssignClassroomTeacherModel`.
 */
class ClassroomTeacherSearch extends AssignClassroomTeacherModel
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'classroom_id', 'teacher_id','subject_id', 'status','semester_id'], 'integer'],
            [['year'],'safe']
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
        // echo "<pre>";
        // print_r($params);
        // echo "</pre>";
        // die;
        $query = AssignClassroomTeacherModel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        // echo "<pre>";
        // print_r($this);
        // echo "</pre>";
        // die;

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

            $classroomsPlanModel = \app\models\ClassroomsPlanModel::find()->where([
                'classroom_id'=>$this->classroom_id,
                'year'=>$this->year,
                'semester_id'=>$this->semester_id
            ])->all();
            $classroom_id = [];
            if($classroomsPlanModel)
            {
                foreach($classroomsPlanModel as $model)
                {
                    $classroom_id[] = $model->id;
                }                
            }
            // else
            // {
            //     $classroom_id = 0;
            // }


        // echo "<pre>";
        // print_r($classroom_id);
        // echo "</pre>";
        // die;


        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'classroom_id' => $classroom_id,
            'subject_id' => $this->subject_id,
            'teacher_id' => $this->teacher_id,
            'status' => $this->status,
        ]);


        return $dataProvider;
    }
}
