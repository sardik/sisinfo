  <script type="text/javascript">
  function hapus(a) { 
  if (confirm("Apakan Data Benar Akan Di Hapus ?") == true) {
        var id = a;
        var li = "proses/siswa.php?hapus=";
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
        Data Siswa
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-laptop"></i> Master Data</a></li>
        <li class="active">Data Siswa</li>
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
                  <th>Nik</th>
                  <th>Nama Lengkap</th>
                  <th>Alamat</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>Jenis Kelamin</th>
                  <th>Agama</th>
                  <th>No Handphone</th>
                  <th>Email</th>
                  <th>Tanggal Masuk</th>
                  <th>Kelas</th>
                  <th>Foto</th>
                  <th>Action</th>
                </tr>
                </thead>

                <tbody>
                  <?php
                    $no = 1;
                    $data = $proses->getall('tbl_siswa',$con,'nama_siswa');
                    if ($data != false) {
                      foreach ($data as $key => $value) {
                        $data_kelas = $proses->getone('tbl_kelas','id_kelas',$value['id_kelas_siswa'],$con);
                      echo "<tr>";
                      echo "<td> ".$value['nik']; 
                      echo "<td> ".$value['nama_siswa'] ;
                      echo "<td> ".$value['alamat'];
                      echo "<td> ".$value['tempat_lahir'] ;
                      echo "<td> ".$value['tgl_lahir'];  
                      echo "<td> ".$value['jenis_kelamin']; 
                      echo "<td> ".$value['agama']; 
                      echo "<td> ".$value['no_telp']; 
                      echo "<td> ".$value['email']; 
                      echo "<td> ".$value['tgl_masuk']; 
                      echo "<td> ".$data_kelas[0]['nama_kelas'];
                      echo '<td> <img src="'.$value['foto'].'" width="40" height="40" >';
                      echo '<td> <a href="?f=datasiswa&&page=addsiswa&&edit='.$value['id_siswa'].'"><button class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> </button></a>';?>
                        <a href="javascript:hapus('<?php echo $value['nik']; ?>');"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> </button></a> 
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
          <a href="?f=datasiswa&&page=addsiswa"><button class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Tambah Siswa</button></a>
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


