  <script type="text/javascript">
  function hapus(a) { 
  if (confirm("Apakan Data Benar Akan Di Hapus ?") == true) {
        var id = a;
        var li = "proses/matapelajaran.php?hapus=";
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
        Data Mata Pelajaran
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-laptop"></i> Master Data</a></li>
        <li class="active">Data Mata Pelajaran</li>
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
            <div class="box-body">
              <table id="data" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Pelajaran</th>
                  <th>Nama Pelajaran</th>
                  <th>Nama Kelas</th>
                  <th>Nama Guru</th>
                  <th>Action</th>
                </tr>
                </thead>

                <tbody>
                  <?php
                    $no = 1;
                    $data = $proses->getall('tbl_matapelajaran',$con,'kode_matapelajaran');
                    if ($data != false) {
                      foreach ($data as $key => $value) {
                           $data_guru = $proses->getone('tbl_guru','id_guru',$value['id_guru_matapelajaran'],$con);
                            $data_kelas = $proses->getone('tbl_kelas','id_kelas',$value['id_kelas_matapelajaran'],$con);
                      echo "<tr>";
                      echo "<td> ".$no; 
                      echo "<td> ".$value['kode_matapelajaran'] ;
                      echo "<td> ".$value['matapelajaran'] ;
                      echo "<td> ".$data_kelas[0]['nama_kelas'];
                      echo "<td> ".$data_guru[0]['nama_lengkap'];
                      echo '<td> <a href="?f=datamatapelajaran&&page=addmatapelajaran&&edit='.$value['id_matapelajaran'].'"><button class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> </button></a>';?>
                        <a href="javascript:hapus('<?php echo $value['id_matapelajaran']; ?>');"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> </button></a> 
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
          <a href="?f=datamatapelajaran&&page=addmatapelajaran"><button class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Tambah Mata Pelajaran</button></a>
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


