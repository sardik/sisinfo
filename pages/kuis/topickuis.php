  <script type="text/javascript">
  function hapus(a) { 
  if (confirm("Apakan Data Benar Akan Di Hapus ?") == true) {
        var id = a;
        var li = "proses/topic_kuis.php?hapus=";
        var lin = li+id; 
        window.location.href = lin;
        }
  }
</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Topic Kuis
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-laptop"></i> Modul Pembelajaran</a></li>
        <li class="active">Topic Kuis</li>
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
                  <th>Nama Mata Pelajaran</th>
                  <th>Judul Kuis</th>
                  <th>Guru</th>
                  <th>Tanggal Dibuat</th>
                  <th>Soal Kuis</th>
                  <th>Nilai Kuis</th>
                  <th>Action</th>
                </tr>
                </thead>

                <tbody>
                  <?php
                    $no = 1;
                    if ($_SESSION['level'] == 1) {
                      $data_guru = $proses->getone('tbl_guru','nip',$_SESSION['username'],$con);
                      $data = $proses->getone('tbl_topickuis','id_guru_kuis',$data_guru[0]['id_guru'],$con);
                    }else{
                        $data = $proses->getall('tbl_topickuis',$con,'judul');
                    }
                    
                    if ($data != false) {
                      foreach ($data as $key => $value) {
                        $data_matapelajaran = $proses->getone('tbl_matapelajaran','id_matapelajaran',$value['id_matapelajaran_kuis'],$con);
                        $data_guru = $proses->getone('tbl_guru','id_guru',$value['id_guru_kuis'],$con);
                      echo "<tr>";
                      echo "<td> ".$no; 
                      echo "<td> ".$data_matapelajaran[0]['matapelajaran'] ;
                      echo "<td> ".$value['judul'];
                      echo "<td> ".$data_guru[0]['nama_lengkap'] ;
                      echo "<td> ".$value['tgl_buat'];  
                      echo '<td> <a href="?f=kuis&&page=kuis&&topic='.$value['id_topkuis'].'">Details</a>';
                      echo '<td> <a href="?f=kuis&&page=nilai&&topic='.$value['id_topkuis'].'">Details</a>';
                      echo '<td> <a href="?f=kuis&&page=addtopickuis&&edit='.$value['id_topkuis'].'"><button class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> </button></a>';?>
                        <a href="javascript:hapus('<?php echo $value['id_topkuis']; ?>');"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> </button></a> 
                        <?php             
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
          <a href="?f=kuis&&page=addtopickuis"><button class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Tambah Topic Kuis</button></a>
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


