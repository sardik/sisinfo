<?php

$judul = 'Tambah';
$nama = '';
$alamat = '';
$tempat_lahir = '';
$tanggal_lahir = '';
$tanggal_masuk = '';
$id_kelas = '';
$jk = '';
$agama = ''; 
$email = '';
$foto = '';
$nohp = '';
$submit = 'simpan';


if (isset($_GET['edit'])) {
    $edit = $_GET['edit'];
    $data = $proses->getone('tbl_siswa','id_siswa',$edit,$con);
    foreach ($data as $key => $value) {
      $nama = $value['nama_siswa'];
      $alamat = $value['alamat'];
      $tempat_lahir = $value['tempat_lahir'];
      $tanggal_lahir = $value['tgl_lahir'];  
      $tanggal_masuk = $value['tgl_masuk']; 
      $jk = $value['jenis_kelamin'];  
      $agama = $value['agama']; 
      $email = $value['email']; 
      $foto = $value['foto']; 
      $id_kelas =  $value['id_kelas_siswa']; 
      $nohp = $value['no_telp']; 
    }
    $submit = 'edit';
    $judul = 'Edit';
}

?>
<script src="plugins/jQuery/upload.js"></script>
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
          url: 'proses/deletefoto.php',
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
        <?php echo $judul; ?> Data Siswa
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-laptop"></i> Master Data</a></li>
        <li class="active"><?php echo $judul; ?> data siswa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
		<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form <?php echo $judul; ?> Data Siswa</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="guru" action="proses/siswa.php" name="guru" method="post">
              <input type="hidden" name="id" value="<?php echo $edit; ?>">
              <div class="box-body col-md-6">
                <div class="form-group">
                  <label for="nama">Nama Lengkap</label>
                  <input type="text" value="<?php echo $nama; ?>" class="form-control" id="nama" name="nama" placeholder="Isi Nama" required title="isi username">
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea name="alamat" id="alamat" class="form-control" required><?php echo $alamat; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="nama">Tempat Lahir</label>
                  <input type="text" value="<?php echo $tempat_lahir; ?>" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Isi Tempat Lahir" required title="isi Tempat Lahir">
                </div>
                <div class="form-group">
                  <label for="nama">Tanggal Lahir</label>
                  <input type="text" value="<?php echo $tanggal_lahir; ?>" class="form-control" id="datepicker" name="tanggal_lahir" placeholder="Isi Tanggal Lahir" required title="isi Tanggal Lahir">
                </div>
                <div class="form-group">
                  <label for="foto">Foto</label><br>
                  <label for="foto_1" id="u_foto" style="<?php if(isset($_GET['edit'])){echo "display: none";} ?>" ><a class="btn btn-info">Upload</a></label>
                  <span id="hasil" style="<?php if(!isset($_GET['edit'])){echo "display: none";} ?>">
                    <img src="<?php echo $foto; ?>"  width="50" height="50" style="border:1px solid; border-radius:2px; padding:1px;">
                    <input type='hidden' name='foto_utama' value='<?php echo $foto; ?>' id='foto_utama'>
                  </span>
                  <div id="close" style="<?php if(!isset($_GET['edit'])){echo "display: none";} ?>;margin-top:-60px;margin-left:40px;" onclick="hapusfoto()"  >
                  <img src="img/close.png" width="20" height="20"/ ></div>
                </div>
              </div>

              <div class="box-body col-md-6">
                <div class="form-group">
                  <label for="nama">Jenis Kelamin</label>
                  <select name="jenis_kelamin" class="form-control">
                      <option value="Laki-laki" <?php if ($jk == "Laki-laki") {
                        echo "SELECTED";
                      } ?>>Laki - laki</option>
                      <option value="Perempuan" <?php if ($jk == "Perempuan") {
                        echo "SELECTED";
                      } ?>>Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="nama">Agama</label>
                  <input type="text" value="<?php echo $agama; ?>" class="form-control" id="agama" name="agama" placeholder="Isi Agama" required title="isi Agama">
                </div>
                <div class="form-group">
                  <label for="nohp">Nomer Handphone</label> 
                  <input type="text" class="form-control" value="<?php echo $nohp; ?>" id="nohp" name="nohp" placeholder="Isi Nomer Handphone" required>
                </div>
                <div class="form-group">
                  <label for="nohp">Email</label> 
                  <input type="email" class="form-control" value="<?php echo $email; ?>" id="email" name="email" placeholder="Isi Email" required>
                </div>
                <div class="form-group">
                  <label for="nama">Tanggal Masuk</label>
                  <input type="text" value="<?php echo $tanggal_masuk; ?>" class="form-control" id="datepicker2" name="tanggal_masuk" placeholder="Isi Tanggal Masuk" required title="isi Tanggal Masuk">
                </div>
                <div class="form-group">
                  <label for="nama">Kelas</label>
                  <?php
                      $data_kelas = $proses->getall('tbl_kelas',$con,'id_kelas');
                  ?>
                  <select name="id_kelas" class="form-control">
                      <?php
                          foreach ($data_kelas as $key => $value) {
                      ?>
                      <option value="<?php echo $value['id_kelas']; ?>" <?php if ($id_kelas == $value['id_kelas']) {
                        echo "SELECTED";
                      } ?>><?php echo $value['nama_kelas']; ?></option>
                      <?php
                        }
                      ?>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="<?php echo $submit; ?>">Submit</button>
              </div>
            </form>
            <form name="foto" method="post" enctype="multipart/form-data" action="proses/foto.php"  id="ufoto" style="display:none;">  
    		  	<input name="foto_1" type="file"  id="foto_1"  > 
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


