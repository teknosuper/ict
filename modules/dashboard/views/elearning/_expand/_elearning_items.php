
	<div class="row">	
              <div class="col-md-12" id="<?= $model->chapter;?>">
                      <div class="box box-primary box-solid">
                        <div class="box-header with-border">
                          <i class="fa fa-book"></i>

                          <h3 class="box-title"><?= $model->chapter;?></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="word-wrap: break-word;">
                          <p><?= \app\models\HelpersClass::getTextClean($model->content);?></p>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
              </div>   		  
  	</div>