<?php
  use \yii\helpers\Html;
?>
<div class="col-md-12">
  <div class="row">
    <div class="col-md-12">
          <div class="box box-danger box-solid">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-info"></i> Petunjuk Penggunaan Soal Daring</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">              
              <table class="table table-condensed table-hover">
                <tbody>
                  <tr>
                    <th colspan="2" class="text-center">Mohon diperhatikan sebelum mengerjakan Soal Daring</th>
                  </tr>
                  <tr>
                    <td>1.</td>
                    <td>
                      <p>Soal Daring tidak harus dilaksanakan di Sekolah, Siswa dapat menggunakan internet di rumah,paketan internet sendiri atau di tempat umum yang menyediakan fasilitas koneksi Wifi (dengan catatan internet yang digunakan cepat dan stabil).</p>
                    </td>
                  </tr>
                  <tr>
                    <td>2.</td>
                    <td>
                      <p>Laptop, Smartphone, Netbook atau Komputer yang akan digunakan untuk mengerjakan Soal Daring harus dalam keadaan baik dan normal (bisa terkoneksi internet), settingan waktu dan tanggal supaya disesuaikan dengan kondisi sebenarnya.</p>
                    </td>
                  </tr>
                  <tr>
                    <td>3.</td>
                    <td>
                      <p>Soal ini bisa dikerjakan mulai <b class="label label-danger"><?= $getQuizResultsByQuizId->quizResultsBelongsToAssignQuiz->start_time;?></b>.</p>
                    </td>
                  </tr>
                  <tr>
                    <td>4.</td>
                    <td>
                      <p>Batas waktu mengerjakan berakhir pada <b class="label label-danger"><?= $getQuizResultsByQuizId->quizResultsBelongsToAssignQuiz->end_time;?></b>, soal tidak bisa dikerjakan lagi apabila waktu telah melebihi <b class="label label-danger"><?= $getQuizResultsByQuizId->quizResultsBelongsToAssignQuiz->end_time;?></b></p>
                    </td>
                  </tr>
                  <tr>
                    <td>5.</td>
                    <td>
                      <p>durasi efektif waktu setelah mulai mengerjakan soal yaitu <b class="label label-danger"><?= $getQuizResultsByQuizId->quizResultsBelongsToAssignQuiz->minutes;?> menit</b>, setelah anda memulai mengerjakan soal, maka durasi waktu akan berjalan dan menampilkan sisa waktu</p>
                    </td>
                  </tr>
                  <tr>
                    <td>6.</td>
                    <td>
                      <p>Soal ini hanya bisa dikerjakan satu kali kesempatan. Apabila sudah mengerjakan kemudian sudah menekan tombol Selesai Mengerjakan, dan melakukan konfirmasi OK, maka tidak bisa mengulangi kembali.</p>
                    </td>
                  </tr>
                </tbody>
              </table>

            </div>
          </div>
    </div>
  </div>
</div>

<div class="col-md-12">
  <div class="row">
    <div class="col-md-12">
          <div class="box box-primary box-solid">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-info"></i> Petunjuk Pengerjaan Soal Daring</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">              
              <table class="table table-condensed table-hover">
                <tbody>
                  <tr>
                    <th colspan="2" class="text-center">Mohon diperhatikan sebelum mengerjakan Soal Daring</th>
                  </tr>
                  <tr>
                    <td>1.</td>
                    <td>
                      <p>Klik Tombol <b class="label label-success">Mulai Mengerjakan</b> dihalaman paling bawah untuk memulai mengerjakan soal, seperti gambar dibawah ini : 
                        <img class="img img-responsive" src="/images/gambar-mulai-mengerjakan.png">
                      </p>
                    </td>
                  </tr>
                  <tr>
                    <td>2.</td>
                    <td>
                      <p>Berikut contoh tampilan Soal Daring :
                        <img class="img img-responsive" src="/images/contoh-soal.png">
                        <ul>
                          <li>pilihlah pilihan ganda dengan cara klik pada pilihan jawaban A,B,C,D,E</li>
                          <li>klik tombol <span class="label label-primary">Jawab Pertanyaan</span> untuk melanjutkan ke pertanyaan selanjutnya</li>
                          <li>Klik nomor halaman untuk memilih nomer soal yang akan dijawab</li>
                          <li>Klik tombol <span class="label label-default"><i class="fa fa-eye"></i> Pratinjau Hasil Soal</span> untuk melihat tinjauan hasil mengerjakan soal dan menyelesaikan</li>
                        </ul>
                      </p>
                    </td>
                  </tr>
                  <tr>
                    <td>3.</td>
                    <td>
                      <p>Setelah klik tombol Selesai / waktu habis, pelaksanaan tes berakhir. Laporan hasil tes dapat dilihat di menu Hasil Belajar -> <a href="/student/results">Daftar nilai</a></p>
                        <ul>
                          <li>klik tombol <span class="label label-primary">Melanjutkan Mengerjakan</span> untuk melanjutkan mengerjakan soal dari awal</li>
                          <li>Klik tombol <span class="label label-danger">Selesai Mengerjakan</span> untuk mengakhiri mengerjakan soal, setelah konfirmasi selesai maka soal tidak dapat dikerjakan kembali.</li>
                        </ul>
                    </td>
                  </tr>
                </tbody>
              </table>

            </div>
            <div class="box-footer clearfix">
              <?php 
                  switch ($getQuizResultsByQuizId->status) {
                    case 0:
                      echo Html::a('<b>Mulai Mengerjakan</b>', ['/student/quiz/take/'.$getQuizResultsByQuizId->quizResultsBelongsToAssignQuiz->id], ['class' => 'btn btn-block btn-success','data' => [ 'confirm' => 'Apakah anda yakin akan memulai mengerjakan soal?', 'method' => 'post']]);
                      # code...
                      break;
                    case 1:
                      echo Html::a('<b>Melanjutkan Mengerjakan</b>', ['/student/quiz/take/'.$getQuizResultsByQuizId->quizResultsBelongsToAssignQuiz->id], ['class' => 'btn pull-left btn-primary']);
                      echo Html::a('<b>Selesai Mengerjakan</b>', ['/student/quiz/end/'.$getQuizResultsByQuizId->quizResultsBelongsToAssignQuiz->id], ['class' => 'btn pull-right btn-danger','data' => [ 'confirm' => 'Apakah anda yakin akan mengakhiri mengerjakan soal?', 'method' => 'post']]);
                      # code...
                      break;
                    default:

                      break;
                  }
              ?>

            </div>

          </div>
    </div>
  </div>
</div>