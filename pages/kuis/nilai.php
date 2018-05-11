 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Nilai Kuis
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-laptop"></i> Modul Pembelajaran</a></li>
        <li>Topic Kuis </li>
        <li class="active">Nilai Kuis </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow: auto;">
              <table id="data" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIK </th>
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  <th>Benar</th>
                  <th>Salah</th>
                  <th>Tidak Dikerjakan</th>
                  <th>Nilai</th>
                </tr>
                </thead>

                <tbody>
                  <?php
                    $no = 1;
                    $data = $proses->getone('tbl_nilai','id_topic_kuis',$_GET['topic'],$con);
                    if ($data != false) {
                      foreach ($data as $key => $value) {
                      	$data_siswa = $proses->getone('tbl_siswa','nik',$value['username'],$con);
                      	$data_kelas = $proses->getone('tbl_kelas','id_kelas',$data_siswa[0]['id_kelas_siswa'],$con);
                      echo "<tr>";
                      echo "<td> ".$no; 
                      echo "<td> ".$value['username'];
                      echo "<td> ".$data_siswa[0]['nama_siswa'];
                      echo "<td> ".$data_kelas[0]['nama_kelas'];
                      echo "<td> ".$value['benar'];
                      echo "<td> ".$value['salah'];
                      echo "<td> ".$value['tidak_dikerjakan'];
                      echo "<td> ".$value['nilai'];           
                      $no += 1;
                      }
                    }
                  ?>  
                </tbody>
            

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>

      <!-- /.row -->
    </section>
  </div>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

<!-- ./wrapper -->


<!-- DataTables -->


