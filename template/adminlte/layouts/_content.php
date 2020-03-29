<?php
use yii\widgets\Breadcrumbs;

?>

      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <small></small>
        </h1>
        <?=
        Breadcrumbs::widget(
            [
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]
        ) ?>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <?= $content;?>
        </div>

      </section>
      <!-- /.content -->
