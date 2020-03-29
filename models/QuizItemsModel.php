<?php

namespace app\models;

use Yii;

use yii\data\Pagination;
/**
 * This is the model class for table "master_hostname".
 *
 * @property int $id
 * @property string $host
 * @property string $host_description
 * @property string $host_template
 * @property int $status
 */
class QuizItemsModel extends \app\models\table\QuizItemsTable
{

	const MULTIPLE_CHOICE = 1;
	const ESSAY = 2;

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'quiz_id' => Yii::t('app', 'Soal'),
            'quiz_type' => Yii::t('app', 'Tipe Kuis'),
            'text' => Yii::t('app', 'Teks'),
            'status' => Yii::t('app', 'Status'),
            'answer_description' => Yii::t('app', 'Penjelasan Jawaban'),
            'correct_option' => Yii::t('app', 'Pilihan Benar'),
            'created_time' => Yii::t('app', 'Waktu Dibuat'),
            // 'created_by' => Yii::t('app', 'Dibuat Oleh'),
        ];
    }

    public function getQuizTypeListDetail($status)
    {
        $array = self::getQuizTypeList();
        return isset($array[$status]) ? $array[$status] : NULL;
    }

    public static function getQuizTypeList()
    {
        return [
            self::MULTIPLE_CHOICE=>"PILIHAN GANDA",
            self::ESSAY=>"ESAI",
        ];
    }

	public function getQuizItemsHasManyQuizItemsOptions()
	{
		return $this->hasMany(QuizItemsOptionsModel::className(),['quiz_item_id'=>'id']);
	}

	public function getQuizItemsBelongsToCorrectQuizItemsOptions()
	{
		return $this->hasMany(QuizItemsOptionsModel::className(),['quiz_item_id'=>'id'])->where(['is_correct_answer'=>1])->one();
	}

	public function getQuizItemsBelongsToQuizResultsAnswer()
	{
		return $this->hasOne(QuizResultsAnswerModel::className(),['quiz_item_id'=>'id']);
	}	

	public function getQuizItemsBelongsToQuizModel()
	{
		return $this->hasOne(QuizModel::className(),['id'=>'quiz_id']);
	}	

	public function getUserAnswer($student_id)
	{
		return $this->getQuizItemsBelongsToQuizResultsAnswer()->where(['created_by'=>$student_id])->one();
	}

	public static function getQuizItems($quiz_id)
	{
		$QuizItemsModelQuery = self::find()->where(['quiz_id'=>$quiz_id]);
		$count = $QuizItemsModelQuery->count();
		$pagination = new Pagination(['totalCount' => $count]);
		$pagination->setPageSize(1);
		$QuizItemsModel = $QuizItemsModelQuery->offset($pagination->offset)
		    ->limit($pagination->limit)
		    ->all();

		if($QuizItemsModel)
		{
			$returnData = [
				'status'=>200,
				'error_message'=>null,
				'returnData'=>[
					'paginationModel'=>$pagination,
					'data'=>$QuizItemsModel,
				],
			];
		}
		else
		{
			$returnData = [
				'status'=>404,
				'error_message'=>null,
				'returnData'=>[],
			];
		}
		return $returnData;

	}

	public function generateOptionList()
	{
		$model = $this->quizItemsHasManyQuizItemsOptions;
		if($model)
		{
			$options = [];
			foreach($model as $modelData)
			{
				$options[$modelData->option] = $modelData->value;
			}
			$returnData = $options;
		}
		else
		{
			$returnData = [];
		}
		return $returnData;
	}
}
