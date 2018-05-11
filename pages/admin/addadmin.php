<?php
 if ($_SESSION['level'] != "0" and !isset($_GET['edit']) ){ 
  header('location:'.$base_url);
  ?>
    <div class="content-wrapper">

    <section class="content-header">
      <h1>Error Access Denied</h1>
    </section>
    </div>
  <?php
 } if ($_SESSION['level'] != "0"  and $_GET['edit'] != $_SESSION['id']){ 
  header('location:'.$base_url);
  ?>
    <div class="content-wrapper">

    <section class="content-header">
      <h1>Error Access Denied</h1>
    </section>
    </div>
  <?php
 }else{
        
$judul = 'Tambah';
$username = '';
$nama = '';
$foto = '';
$submit = 'simpan';


if (isset($_GET['edit'])) {
    $edit = $_GET['edit'];
    $data = $proses->getone('tbl_user','id_user',$edit,$con);
    foreach ($data as $key => $value) {
      $username = $value['username'];
      $nama = $value['nama_lengkap'];
    }
    $submit = 'edit';
    $judul = 'Edit';
}

?>

<script src="<?php echo $base_url ?>plugins/jQuery/upload.js"></script>
  <!-- Content Wrapper. Contains page content -->
<script type="text/javascript">
$(function() {  
  var UPLOAD ={
    init : function (){
      $('#foto_1').change(function(){
        $('#ufoto').submit();
        $("#satu").remove()
        $('#u_foto').hide();
        });
      
      $('#ufoto').iframePostForm ({
            post : function (){
            },
        
            complete : function (result){
          $('#u_foto').hide();
          $("#hasil").show()
          $("#hasil").html(result);
          $("#close").show();
          }
      });
    }
    
  };
  
UPLOAD.init();     
});   
function hapusfoto(){
  var file_name = document.getElementById("foto_utama").value;
  var dataString = 'hapus='+ file_name;
        $.ajax({
          type: "GET",
          url: '<?php echo $base_url ?>proses/deletefoto.php',
          data: dataString,
          success: function (response) {
          $('#u_foto').show();
          $("#close").hide();
          $("#hasil").hide()
          $('#foto_utama').val('');
          },
          error: function () {
             alert('gagal')
          }
        });
}

</script>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $judul; ?> Admin
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-laptop"></i> Master Data</a></li>
        <li class="active"><?php echo $judul; ?> Admin</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
	       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form <?php echo $judul; ?> Admin</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="sales" action="proses/admin.php" name="sales" method="post">
              <input type="hidden" name="id" value="<?php echo $edit; ?>">
              <div class="box-body col-md-12">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Isi Username" required title="isi username" value="<?php echo $username; ?>" <?php if ($_SESSION['level'] == 1) {
                    echo " disabled";
                  } ?> style="width: 50%">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Isi Password" required style="width: 50%">
                </div>
                <div class="form-group">
                  <label for="nama">Nama Lengkap</label>
                  <input type="text" value="<?php echo $nama; ?>" class="form-control" id="nama" name="nama" placeholder="Isi Nama" required title="isi Nama Lengkap" style="width: 80%">
                </div>
              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="<?php echo $submit; ?>">Submit</button>
              </div>
            </form>
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
<?php } ?>

