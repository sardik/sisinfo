<?php
 if ($_SESSION['level'] != "0"){ 
  header('location: ../index.php');
    ?>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Error Access Denied</h1>
    </section>
    </div>
  <?php
 }else{
?>

  <script type="text/javascript">
  function hapus(a) { 
  if (confirm("Apakan Data Benar Akan Di Hapus ?") == true) {
        var id = a;
        var li = "proses/admin.php?hapus=";
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
        Data Admin
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-laptop"></i> Master Data</a></li>
        <li class="active">Data Admin </li>
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
              <table id="datasales" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Nama</th>
                  <th>Level</th>
                  <th>Action</th>
                </tr>
                </thead>

                <tbody>
                  <?php
                    $no = 1;
                    $query = "SELECT * FROM `tbl_user` WHERE `level` < 1 ";
                    $data = $proses->getquery($query,$con);
                    if ($data != false) {
                      foreach ($data as $key => $value) {
                        if ($value['level'] == '0') {
                            $level = "Admin";
                        }else{
                            $level = "Guru";
                        }
                      echo "<tr>";
                      echo "<td> ".$no; 
                      echo "<td> ".$value['username'] ;
                      echo "<td> ".$value['nama_lengkap'];
                      echo "<td> ".$level;  
                      echo '<td> <a href="?f=admin&&page=addadmin&&edit='.$value['id_user'].'"><button class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> </button></a>';?>
                        <a href="javascript:hapus('<?php echo $value['id_user']; ?>');"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> </button></a> 
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
          <a href="?f=admin&&page=addadmin"><button class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Tambah Admin</button></a>
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

<?php } ?>
