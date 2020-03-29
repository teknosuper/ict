	<div class="row">	
              <div class="col-md-12">
                      <div class="box box-primary box-solid">
                        <div class="box-header with-border">
                          <i class="fa fa-book"></i>

                          <h3 class="box-title">Silabus <?= $model->title;?></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="height:100%;overflow-y:auto;">
                          <p><?= \app\models\HelpersClass::getTextClean($model->syllabus);?></p>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
              </div>   		  
  	</div>