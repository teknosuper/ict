<div class="row">	
	<div class="posts">
		<div class="col-md-6 col-sm-6 col-xs-12"> <img src="<?=$model->cover_image;?>" alt=""> </div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<h3><?= $model->chapter;?></h3>
			<p>Diunggah oleh: <b><?= $model->eLearningItemsModelBelongsToUsersModel->userBelongsToUserType->full_name;?></b> | Tanggal: <b><?= $model->created_time;?></b> | materi : <b><?= $model->eLearningItemsModelBelongsToSubjectsPlanModel->chapter;?></b></p>
			<p><?=$model->description;?></p> <a href="<?= \yii\helpers\Url::toRoute(['view','id'=>$model->id]);?>" class="link-btn">Baca Selanjutnya</a> 
		</div>
	</div>
</div>