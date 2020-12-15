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
class NilaiAkhirModel extends \app\models\table\NilaiAkhirTable
{

    public function getStudentIdBelongsToStudentsModel()
    {
        return $this->hasOne(StudentsModel::className(),['id'=>'student_id']);
    }

}
