<script type="text/javascript">
  function hapus(a) { 
  if (confirm("Apakan Data Benar Akan Di Hapus ?") == true) {
        var id = a;
        var li = "proses/pengaduan.php?hapus=";
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
        Laporan Pengaduan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-laptop"></i> Pengaduan</a></li>
        <li class="active">List Pengaduan</li>
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
                  <th>Tanggal</th>
                  <th>Nama </th>
                  <th>Level</th>
                  <th>Pangaduan</th>
                  <th>Action</th>
                </tr>
                </thead>

                <tbody>
                  <?php
                    $no = 1;
                    $query = "SELECT * FROM `tbl_pengaduan` where status = 1 ORDER BY `tgl_dibuat` DESC ";
                    $data = $proses->getquery($query,$con);
                    if ($data != false) {
                      foreach ($data as $key => $value) {
                      	   if ($value['level'] == '2') {
                      	   		$data_pengadu = $proses->getone('tbl_siswa','nik',$value['username'],$con);
                      	   		$level = 'Siswa';
                      	   		$nama = $data_pengadu[0]['nama_siswa'];
                      	   }else{
                      	   		$data_pengadu = $proses->getone('tbl_guru','nip',$value['username'],$con);
                      	   		$level = 'Guru';
                      	   		$nama = $data_pengadu[0]['nama_lengkap'];
                      	   }
                      echo "<tr>";
                      echo "<td> ".$no; 
                      echo "<td> ".$value['tgl_dibuat'] ;
                      echo "<td> ".$nama ;
                      echo "<td> ".$level;
                      echo "<td> ".$value['deskripsi'];
                    ?>
                      <td>  <a href="javascript:hapus('<?php echo $value['id_pengaduan']; ?>');"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> </button></a>  
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


