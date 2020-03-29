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
class AssignQuizModel extends \app\models\table\AssignQuizTable
{
    
    public $quiz_status;
    public $grade_in_point;
    public $taken;

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'classroom_id' => Yii::t('app', 'Kelas'),
            'quiz_id' => Yii::t('app', 'ID Soal'),
            'quiz_type' => Yii::t('app', 'Tipe Soal'),
            'start_time' => Yii::t('app', 'Batas Waktu Mulai'),
            'end_time' => Yii::t('app', 'Batas Waktu Berakhir'),
            'created_time' => Yii::t('app', 'Waktu Buat'),
            'updated_time' => Yii::t('app', 'Waktu Update'),
            'instruction' => Yii::t('app', 'Instruksi'),
            'description' => Yii::t('app', 'Deskripsi'),
            'minutes' => Yii::t('app', 'Menit'),
            'enable_pause' => Yii::t('app', 'Enable Pause'),
            'subject_id' => Yii::t('app', 'Mata Pelajaran'),
            'teacher_id' => Yii::t('app', 'Guru'),
            'quiz_title' => Yii::t('app', 'Judul Soal'),
            'created_by' => Yii::t('app', 'Dibuat Oleh'),
        ];
    }

    public function getAssignQuizModelBelongsToClassroomsPlanModel()
    {
        return $this->hasOne(ClassroomsPlanModel::className(),['id'=>'classroom_id']);
    }

    public function getAssignQuizModelBelongsToTeachersModel()
    {
        return $this->hasOne(TeachersModel::className(),['id'=>'teacher_id']);
    }

    public function getQuizResultsHasManyQuizItems()
    {
     return $this->hasMany(QuizItemsModel::className(),['quiz_id'=>'quiz_id']);
    }    

    public function getCheckAllStatus()
    {
        $model = $this->assignQuizModelHasManyQuizResultsModel;
        if($model)
        {
            foreach($model as $modelData)
            {
                $modelData->getCheckStatus();
            }            
        }

    }

    public function getAssignQuizModelBelongsToQuizModel()
    {
        return $this->hasOne(QuizModel::className(),['id'=>'quiz_id']);
    }   
    public function getAssignQuizModelBelongsToQuizResultsModel()
    {
        return $this->hasOne(QuizResultsModel::className(),['quiz_id'=>'id']);
    }   

    public function getStudentGradePoint($student_id)
    {
        return $this->getAssignQuizModelBelongsToQuizResultsModel()->where(['student_id'=>$student_id])->one();
    }

    public function getAssignQuizModelHasManyQuizResultsModel()
    {
        return $this->hasMany(QuizResultsModel::className(),['quiz_id'=>'id']);
    }

    public function getStats($student_id)
    {
        $quizModelHasManyQuizItemsModel = $this->getAssignQuizModelHasManyQuizResultsModel()->where(['student_id'=>$student_id])->one();
     
        $quizResultsHasManyQuizItems = $quizModelHasManyQuizItemsModel->quizResultsBelongsToAssignQuiz->getQuizResultsHasManyQuizItems();
        $quiz_total_questions = $quizResultsHasManyQuizItems->count();
        $getQuizResultsHasManyQuizResultsAnswer = $quizModelHasManyQuizItemsModel->quizResultsHasManyQuizResultsAnswer;
        $resultsAnswerArray = [];

        foreach($getQuizResultsHasManyQuizResultsAnswer as $model)
        {
            if($model->quizResultsAnswerModelBelongsToQuizItemsModel->quiz_type==\app\models\QuizItemsModel::MULTIPLE_CHOICE)
            {
                $resultsAnswerArray[$model->quiz_item_id] = $model->option;
            }

        }

        $correctAnswerArray = [];
        foreach($quizResultsHasManyQuizItems->all() as $model)
        {
            if($model->quiz_type==\app\models\QuizItemsModel::MULTIPLE_CHOICE)
            {
                $correctAnswerArray[$model->id] = $model->quizItemsBelongsToCorrectQuizItemsOptions->option;
            }
        }
        $wrong_answers = array_diff_assoc($correctAnswerArray,$resultsAnswerArray);
        $count_total_items = $quiz_total_questions;
        $count_correct_answers = $count_total_items-count($wrong_answers);
        $last_results = ($count_correct_answers/$count_total_items)*100;
        $quiz_total_answered = $quizModelHasManyQuizItemsModel->getQuizResultsHasManyQuizResultsAnswer()->count();
        $quiz_total_unanswered = $quiz_total_questions - $quiz_total_answered;
        return [
            'status'=>200,
            'error_message'=>null,
            'returnData'=>[
                'quiz_total_questions'=>$quiz_total_questions,
                'quiz_total_answered'=>$quiz_total_answered,
                'quiz_total_unanswered'=>$quiz_total_unanswered,
                'quiz_total_correct_answers'=>$count_correct_answers,
                'last_results'=>$last_results,
                'quiz_taken'=>$quizModelHasManyQuizItemsModel->quiz_taken,
                'quiz_finish'=>$quizModelHasManyQuizItemsModel->quiz_finish,
            ]
        ];
    }

    public function getCalculateAllAnswer($student_id)
    {
        $quizModelHasManyQuizItemsModel = $this->getAssignQuizModelHasManyQuizResultsModel()->where(['student_id'=>$student_id])->one();
        $quizResultsHasManyQuizItems = $quizModelHasManyQuizItemsModel->quizResultsBelongsToAssignQuiz->getQuizResultsHasManyQuizItems();
        $quiz_total_questions = $quizResultsHasManyQuizItems->count();
        $getQuizResultsHasManyQuizResultsAnswer = $quizModelHasManyQuizItemsModel->quizResultsHasManyQuizResultsAnswer;
        $resultsAnswerArray = [];
        foreach($getQuizResultsHasManyQuizResultsAnswer as $model)
        {
            $resultsAnswerArray[$model->quiz_item_id] = $model->option;
        }

        $correctAnswerArray = [];
        foreach($quizResultsHasManyQuizItems->all() as $model)
        {
            $correctAnswerArray[$model->id] = $model->quizItemsBelongsToCorrectQuizItemsOptions->option;
        }
        $wrong_answers = array_diff_assoc($correctAnswerArray,$resultsAnswerArray);
        $count_total_items = $quizResultsHasManyQuizItems->count();
        $count_correct_answers = $count_total_items-count($wrong_answers);
        $last_results = ($count_correct_answers/$count_total_items)*100;

        $quizModelHasManyQuizItemsModel->grade_point = round($last_results,0);
        $save = $quizModelHasManyQuizItemsModel->update();
    }

}
