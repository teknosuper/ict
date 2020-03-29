<div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Deskripsi Materi</a></li>
              <li ><a href="#tab_2" data-toggle="tab">Daftar Isi Materi</a></li>
              <li><a href="#tab_3" data-toggle="tab">Silabus</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
              	<?= $model->description;?>
              </div>
              <div class="tab-pane" id="tab_2">
		            <div class="box box-solid">
		              <div class="box-header with-border">
		                <i class="fa fa-text-width"></i>

		                <h3 class="box-title">Chapter</h3>
		              </div>
		              <!-- /.box-header -->
		              <div class="box-body">
		                <ol>
		                <?php if($model->elearningHasManyElearningItems):?>
		                  <?php foreach($model->elearningHasManyElearningItems as $elearningItems):?>
                        <li><a href="/student/elearning/view?id=<?=$model->id;?>&chapter_id=<?= $elearningItems->id;?>"><?= $elearningItems->chapter;?></a></li>
		                  <?php endforeach;?>
		                <?php endif;?>
		                </ol>
		              </div>
		              <!-- /.box-body -->
		            </div>
		            <!-- /.box -->

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
              	<?= $model->syllabus;?>
              </div>

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>