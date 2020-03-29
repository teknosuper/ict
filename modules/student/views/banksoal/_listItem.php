

                        <div class="db-2-main-1 well">
                            <div class="db-2-main-2"> <img src="/templates/maindashboard/images/icon/db2.png" alt=""><span><?= $model->chapter;?></span>
                                <ul>
                                	<?php if($model->subjectsPlanModelHasManyChild):?>
                                		<?php foreach($model->subjectsPlanModelHasManyChild as $subjectsPlanModelHasManyChild):?>
	                                    <li>
	                                    	<a href="<?= \yii\helpers\Url::toRoute(['/student/banksoal/chapter', 'id' => $subjectsPlanModelHasManyChild->id]);?>"><?=$subjectsPlanModelHasManyChild->chapter;?></a>
	                                    </li>
		                                <?php endforeach;?>
	                                <?php endif;?>
                                </ul>
                            </div>
                        </div>
