<?php

$judul = 'Tambah';
$nama = '';
$tanggal_dibuat = '';
$submit = 'simpan';
$topic = $_GET['topic'];

if (isset($_GET['edit'])) {
    $edit = $_GET['edit'];
    $data = $proses->getone('tbl_modul','id_modul',$edit,$con);
    foreach ($data as $key => $value) {
      $nama = $value['nama_modul'];
      $tanggal_dibuat = $value['tgl_dibuat'];
    }
    $submit = 'edit';
    $judul = 'Edit';
}

?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $judul; ?> Modul
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-laptop"></i> Modul Pembelajaran</a></li>
        <li class="active"><?php echo $judul; ?> modul</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
		<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form <?php echo $judul; ?> Modul</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="guru" action="proses/modul.php" name="guru" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?php echo $edit; ?>">
              <input type="hidden" name="topicmodul" value="<?php echo $topic; ?>">
              <div class="box-body col-md-6">
                <div class="form-group">
                  <label for="nama">Judul Modul</label>
                  <input type="text" value="<?php echo $nama; ?>" class="form-control" id="nama" name="nama" placeholder="Isi Judul Topic" required title="isi Judul Topic">
                </div>
              <div class="form-group">
                  <label for="tanggal_dibuat">Tanggal Dibuat</label>
                  <input type="text" value="<?php echo $tanggal_dibuat; ?>" class="form-control" id="datepicker" name="tanggal_dibuat" placeholder="Isi Tanggal Dibuat" required title="isi Tanggal Dibuat">
                </div>
                <div class="form-group">
                  <label for="files">File</label>
                  <input type="file" class="form-control" name="filemodul" >
                </div>
                <span style="color:red"><?php if (isset($_GET['message'])){echo $_GET['message'];} ?></span> <br>
                <button type="submit" class="btn btn-primary" name="<?php echo $submit; ?>">Submit</button>
              <!-- /.box-body -->
            </div>
              <div class="box-footer">
                
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


