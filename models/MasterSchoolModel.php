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
class MasterSchoolModel extends \app\models\table\MasterSchoolTable
{

	// public function getProductHasManyGalleries()
	// {
	// 	return $this->hasMany(ProductGalleriesClass::className(),['id_product'=>'id_product']);
	// }

	// public function getProductBelongsToCategory()
	// {
	// 	return $this->hasOne(ProductCategoryClass::className(),['id_category'=>'product_category']);
	// }

	public static function getSchoolList()
	{
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id', 'school_name');
	}

}
