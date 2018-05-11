<?php

$judul = 'Tambah';
$nama = '';
$id_guru = '';
$submit = 'simpan';


if (isset($_GET['edit'])) {
    $edit = $_GET['edit'];
    $data = $proses->getone('tbl_kelas','id_kelas',$edit,$con);
    foreach ($data as $key => $value) {
      $nama = $value['nama_kelas'];
      $id_guru = $value['id_guru_walikelas'];
    }
    $submit = 'edit';
    $judul = 'Edit';
}

?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $judul; ?> Data Kelas
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-laptop"></i> Master Data</a></li>
        <li class="active"><?php echo $judul; ?> data kelas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
		<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form <?php echo $judul; ?> Data Kelas</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="guru" action="proses/kelas.php" name="guru" method="post">
              <input type="hidden" name="id" value="<?php echo $edit; ?>">
              <div class="box-body col-md-6">
                <div class="form-group">
                  <label for="nama">Nama Kelas</label>
                  <input type="text" value="<?php echo $nama; ?>" class="form-control" id="nama" name="nama" placeholder="Isi Nama Kelas" required title="isi Nama Kelas">
                </div>
                <div class="form-group">
                  <label for="id_guru">Wali Kelas</label>
                  <?php
                      $data_guru = $proses->getall('tbl_guru',$con,'nip');
                  ?>
                  <select name="id_guru" class="form-control">
                      <?php
                          foreach ($data_guru as $key => $value) {
                      ?>
                      <option value="<?php echo $value['id_guru']; ?>" <?php if ($id_guru == $value['id_guru']) {
                        echo "SELECTED";
                      } ?>><?php echo $value['nama_lengkap']; ?></option>
                      <?php
                        }
                      ?>
                  </select>
              </div>
              <!-- /.box-body -->
              <button type="submit" class="btn btn-primary" name="<?php echo $submit; ?>">Submit</button>
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


