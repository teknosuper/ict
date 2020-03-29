				<div class="rows p2_2">
                    <div class="tour_right tour_rela tour-ri-com">
                        <div class="col-md-4 col-sm-4 col-xs-12 p2_1">
    <!--                         <div class="band"><img src="/templates/maindashboard/images/band.png" alt="">
                            </div> -->
                            <div class="row text-center">
                                <iframe src="<?=$model->file_html;?>"></iframe>                                
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-12 p2">
                            <div class="row">
                                <h3 class="text-center"><?=$model->title;?> </h3>
                            </div>

                            <p>oleh : <?= $model->simulationModelBelongsToUsersModel->userBelongsToUserType->full_name;?></p>
                            <p><?=$model->description;?></p>
                            <div class="p2_book">
                                <ul>
                                    <li><a href="<?= \yii\helpers\Url::toRoute(['/student/simulation/view','id'=>$model->id]);?>" class="link-btn modal-form" data-size = 'modal-lg'>Mainkan Simulasi</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>