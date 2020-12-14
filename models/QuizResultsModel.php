<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_hostname".
 *
 * @property int $id
 * @property string $host
 * @property string $host_description
 * @property string $host_template
 * @property int $status
 */
class QuizResultsModel extends \app\models\table\QuizResultsTable
{

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'student_id' => Yii::t('app', 'Siswa'),
            'quiz_id' => Yii::t('app', 'Soal'),
            'quiz_taken' => Yii::t('app', 'Quiz Taken'),
            'quiz_finish' => Yii::t('app', 'Quiz Finish'),
            'status' => Yii::t('app', 'Status'),
            'grade_point' => Yii::t('app', 'Nilai'),
            'quiz_model' => Yii::t('app', 'Model Soal'),
            'quiz_type' => Yii::t('app', 'Tipe Soal'),
        ];
    }

	const QUIZ_ONLINE = 1;
	const QUIZ_OFFLINE = 2;

    public static function getQuizModelList()
    {
        return [
            self::QUIZ_ONLINE=>"DARING",
            self::QUIZ_OFFLINE=>"LURING",
        ];
    }

    public function getQuizModelDetail()
    {
    	$status = $this->quiz_model;
        $array = self::getQuizModelList();
        return isset($array[$status]) ? $array[$status] : NULL;
    }

    public function getQuizFormulaText()
    {
    	return ($this->quizResultsModelToQuizFormulaModel) ? $this->quizResultsModelToQuizFormulaModel->tipe_kuis : $this->quiz_type;
    }

	public function getQuizResultsModelToQuizFormulaModel()
	{
		return $this->hasOne(QuizFormulaModel::className(),['id'=>'quiz_type']);
	}

	public function getQuizResultsModelToStudentsModel()
	{
		return $this->hasOne(StudentsModel::className(),['id'=>'student_id']);
	}

	public function getQuizResultsBelongsToAssignQuiz()
	{
		return $this->hasOne(AssignQuizModel::className(),['id'=>'quiz_id']);
	}	

	public function getQuizResultsBelongsToQuizModel()
	{
		return $this->hasOne(QuizModel::className(),['id'=>'quiz_id']);
	}	

	public function getQuizResultsHasManyQuizResultsAnswer()
	{
		return $this->hasMany(QuizResultsAnswerModel::className(),['quiz_result_id'=>'id']);
	}	

    public function getCheckStatus()
    {
        $minutes = $this->quizResultsBelongsToAssignQuiz->minutes;
        $quiz_taken = $this->quiz_taken;
        $start_time = $this->quizResultsBelongsToAssignQuiz->start_time;
        $end_time = $this->quizResultsBelongsToAssignQuiz->end_time;
        $now_time = date('Y-m-d H:i:s');
        $quiz_takenAndminutes = date('Y-m-d H:i:s',strtotime("+{$minutes} minute",strtotime($quiz_taken)));
        if($now_time > $end_time)
        {
            $this->status = 2;
        	if(!$quiz_taken)
        	{
	            $this->status = 3;
        	}
        	if($now_time > $quiz_takenAndminutes)
        	{
	            $this->status = 3;
        	}
            $this->save();
        }
        else
        {
        	if($quiz_taken)
        	{
	        	if($now_time > $quiz_takenAndminutes)
	        	{
		            // $this->status = 3;
	        	}        		
        	}

            $this->save();
        }
    }

	public function getStatusDetail()
	{
		switch ($this->status) {
			case 0:
				return "<span class='label label-warning'>Belum Dikerjakan</span>";
				# code...
				break;
			case 1:
				return "<span class='label label-primary'>Masih Dikerjakan</span>";
				# code...
				break;		
			case 2:
				return "<span class='label label-success'><i class='fa fa-times-circle-o'></i> Selesai Dikerjakan & Menunggu dikoreksi</span>";
				# code...
				break;						
			case 3:
				return "<span class='label label-danger'>Tidak Dikerjakan</span>";
				# code...
				break;						
			case 4:
				return "<span class='label label-success'><i class='fa fa-check'></i> Sudah Dikoreksi</span>";
				# code...
				break;						
			default:
				return "<span class='label label-warning'>Belum Dikerjakan</span>";
				# code...
				break;
		}
	}

	public static function startQuiz($user_id,$quiz_id)
	{
		$model = self::find()->where(['student_id'=>$user_id,'quiz_id'=>$quiz_id])->one();
		if(!$model)
		{
			$model = new QuizResultsModel;
			$model->student_id = $user_id;
			$model->quiz_id = $quiz_id;
			$model->quiz_taken = date('Y-m-d H:i:s');
			$model->quiz_finish = date('Y-m-d H:i:s');
			$model->status = 1;
			$model->save();
		}
		else
		{
			if($model->status !== 1)
			{
				$model->quiz_taken = date('Y-m-d H:i:s');				
				$model->status = 1;
			}
			$model->quiz_finish = date('Y-m-d H:i:s');
			$model->update();
		}

		return [
			'status'=>200,
			'error_message'=>null,
			'returnData'=>[
				'model'=>$model,
				'id'=>$model->id,
				'student_id'=>$model->student_id,
				'quiz_id'=>$model->quiz_id,
				'quiz_taken'=>$model->quiz_taken,
				'quiz_finish'=>$model->quiz_finish,
				'status'=>$model->status,
			],
		];
	}
}
