				<div class="rows p2_2">
                    <div class="tour_right tour_rela tour-ri-com">
                        <div class="col-md-4 col-sm-4 col-xs-12 p2_1">
                            <div class="band"><img src="images/band.png" alt="">
                            </div>
                            <img src="/templates/maindashboard/images/membacabuku.png" alt="">
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-12 p2">
                            <div class="row">
                                <h3 class="text-center"><?=$model->chapter;?> </h3>
                            </div>
                            <p>oleh : <?= $model->eLearningItemsModelBelongsToUsersModel->userBelongsToUserType->full_name;?></p>
                            <p><?=$model->description;?></p>
                            <div class="p2_book">
                                <ul>
                                    <li><a href="<?= \yii\helpers\Url::toRoute(['/student/elearning/view','id'=>$model->id]);?>" class="link-btn">Baca Lajutan Materi</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>