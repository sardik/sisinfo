  <script type="text/javascript">
  function hapus(a) { 
  if (confirm("Apakan Data Benar Akan Di Hapus ?") == true) {
        var id = a;
        var li = "proses/kelas.php?hapus=";
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
        Data Kelas
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-laptop"></i> Master Data</a></li>
        <li class="active">Data Kelas</li>
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
                  <th>Nama Kelas</th>
                  <th>Wali Kelas</th>
                  <th>Action</th>
                </tr>
                </thead>

                <tbody>
                  <?php
                    $no = 1;
                    $data = $proses->getall('tbl_kelas',$con,'nama_kelas');
                    if ($data != false) {
                      foreach ($data as $key => $value) {
                           $data_guru = $proses->getone('tbl_guru','id_guru',$value['id_guru_walikelas'],$con);
                      echo "<tr>";
                      echo "<td> ".$no; 
                      echo "<td> ".$value['nama_kelas'] ;
                      echo "<td> ".$data_guru[0]['nama_lengkap'];
                      echo '<td> <a href="?f=datakelas&&page=addkelas&&edit='.$value['id_kelas'].'"><button class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> </button></a>';?>
                        <a href="javascript:hapus('<?php echo $value['id_kelas']; ?>');"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> </button></a> 
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
          <a href="?f=datakelas&&page=addkelas"><button class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Tambah Kelas</button></a>
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


