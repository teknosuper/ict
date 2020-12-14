<table class="table">
	<tr>
		<td>Quiz Taken</td>
		<td>:</td>
		<td><?= ($model->getStudentGradePoint(\yii::$app->user->identity->userBelongsToUserType->id)) ? $model->getStudentGradePoint(\yii::$app->user->identity->userBelongsToUserType->id)->quiz_taken : null;?></td>
	</tr>
	<tr>
		<td>Quiz Finish</td>
		<td>:</td>
		<td><?= ($model->getStudentGradePoint(\yii::$app->user->identity->userBelongsToUserType->id)) ? $model->getStudentGradePoint(\yii::$app->user->identity->userBelongsToUserType->id)->quiz_finish : null;?></td>
	</tr>
</table>