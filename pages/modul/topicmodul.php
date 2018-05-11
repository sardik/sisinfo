  <script type="text/javascript">
  function hapus(a) { 
  if (confirm("Apakan Data Benar Akan Di Hapus ?") == true) {
        var id = a;
        var li = "proses/topic_modul.php?hapus=";
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
        Topic Modul
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-laptop"></i> Modul Pembelajaran</a></li>
        <li class="active">Topic Modul</li>
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
                  <th>Judul </th>
                  <th>Guru</th>
                  <th>Tanggal Dibuat</th>
                  <th>Moduls</th>
                  <th>Action</th>
                </tr>
                </thead>

                <tbody>
                  <?php
                    $no = 1;
                    if ($_SESSION['level'] == 1) {
                      $data_guru = $proses->getone('tbl_guru','nip',$_SESSION['username'],$con);
                      $data = $proses->getone('tbl_topicmodul','id_gurumodul',$data_guru[0]['id_guru'],$con);
                    }else{
                        $data = $proses->getall('tbl_topicmodul',$con,'judul');
                    }
                    if ($data != false) {
                      foreach ($data as $key => $value) {
                        $data_matapelajaran = $proses->getone('tbl_matapelajaran','id_matapelajaran',$value['id_matapelajaranmodul'],$con);
                        $data_guru = $proses->getone('tbl_guru','id_guru',$value['id_gurumodul'],$con);
                      echo "<tr>";
                      echo "<td> ".$no; 
                      echo "<td> ".$data_matapelajaran[0]['matapelajaran'] ;
                      echo "<td> ".$value['judul'];
                      echo "<td> ".$data_guru[0]['nama_lengkap'] ;
                      echo "<td> ".$value['tgl_dibuat'];  
                      echo '<td> <a href="?f=modul&&page=modul&&topic='.$value['id_topmodul'].'">Details</a>';
                      echo '<td> <a href="?f=modul&&page=addtopicmodul&&edit='.$value['id_topmodul'].'"><button class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> </button></a>';?>
                        <a href="javascript:hapus('<?php echo $value['id_topmodul']; ?>');"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> </button></a> 
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
          <a href="?f=modul&&page=addtopicmodul"><button class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Tambah Topic Modul</button></a>
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


