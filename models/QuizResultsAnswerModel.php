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
class QuizResultsAnswerModel extends \app\models\table\QuizResultsAnswerTable
{
    public function getQuizResultsAnswerModelBelongsToQuizItemsModel()
    {
        return $this->hasOne(QuizItemsModel::className(),['id'=>'quiz_item_id']);
    }   

	public static function getAnswer($quiz_result_id,$quiz_item_id,$return='option')
	{
		$model = self::find()->where(['quiz_result_id'=>$quiz_result_id,'quiz_item_id'=>$quiz_item_id])->one();
		if($model)
		{
			return $model->$return;
		}	
		else
		{
			return null;
		}
	}

	public static function setAnswer($quiz_result_id,$quiz_item_id,$option,$created_by)
	{
		$model = self::find()->where(['quiz_result_id'=>$quiz_result_id,'quiz_item_id'=>$quiz_item_id])->one();
		if(!$model)
		{
			$model = new QuizResultsAnswerModel;
			$model->quiz_result_id = $quiz_result_id;
			$model->quiz_item_id = $quiz_item_id;
			$model->option = $option;
			$model->created_by = $created_by;
			$model->save();
		}	
		else
		{
			$model->option = $option;
			$model->update();
		}
	}

	public static function setAnswerEssay($quiz_result_id,$quiz_item_id,$answer,$created_by)
	{
		$model = self::find()->where(['quiz_result_id'=>$quiz_result_id,'quiz_item_id'=>$quiz_item_id])->one();
		if(!$model)
		{
			$model = new QuizResultsAnswerModel;
			$model->quiz_result_id = $quiz_result_id;
			$model->quiz_item_id = $quiz_item_id;
			$model->answer = $answer;
			$model->created_by = $created_by;
			$model->save();
		}	
		else
		{
			$model->answer = $answer;
			$model->update();
		}
	}

}
