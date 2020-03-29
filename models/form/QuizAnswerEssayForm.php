<?php

namespace app\models\form;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class QuizAnswerEssayForm extends Model
{
    public $answer;
    public $optionItems;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['answer'], 'required'],
            [['optionItems'], 'safe'],
        ];
    }

    /**
     * @return array customized attribute labels
     */

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */

}
