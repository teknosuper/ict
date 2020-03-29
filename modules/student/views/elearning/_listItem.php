<?php 
\conquer\modal\ModalForm::widget([
    'selector' => '.modal-form',
]);
?>

                        <div class="db-2-main-1 well">
                            <div class="db-2-main-2"> <img src="/templates/maindashboard/images/icon/db2.png" alt=""><span><?= $model->chapter;?></span>
                                <ul>
                                	<?php if($model->subjectsPlanModelHasManyChild):?>
                                		<?php foreach($model->subjectsPlanModelHasManyChild as $subjectsPlanModelHasManyChild):?>
	                                    <li>
	                                    	<a href="<?= \yii\helpers\Url::toRoute(['/student/elearning/chapter', 'id' => $subjectsPlanModelHasManyChild->id]);?>"><?=$subjectsPlanModelHasManyChild->chapter;?> <span class="db-done"><?=$subjectsPlanModelHasManyChild->getSubjectsPlanModelHasManyELearningItemsModel()->where(['elearning_type'=>'elearning'])->count();?></span></a>
	                                    </li>
		                                <?php endforeach;?>
	                                <?php endif;?>
                                </ul>
                                <ul>
                                    <li><a data-pjax=0 target='__blank' href='https://docs.google.com/viewerng/viewer?url=<?= \yii\helpers\Url::to($model->learning_objective,true);?>&hl=en' class="btn btn-xs btn-success"><i class="fa fa-book"></i> Tujuan Pembelajaran <b><?= $model->chapter;?></b></a></li>
                                    <li><a href="<?= \yii\helpers\Url::toRoute(['/student/elearning/subjectreference','id'=>$model->id]);?>" class="btn btn-xs btn-warning modal-form" data-size= "modal-lg"><i class="fa fa-link"></i> Referensi Materi <b><?= $model->chapter;?></b></a></li>
                                </ul>
                            </div>
                        </div>
