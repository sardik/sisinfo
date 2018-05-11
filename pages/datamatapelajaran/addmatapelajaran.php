<?php

$judul = 'Tambah';
$kode = '';
$nama = '';
$id_kelas = '';
$id_guru = '';
$submit = 'simpan';


if (isset($_GET['edit'])) {
    $edit = $_GET['edit'];
    $data = $proses->getone('tbl_matapelajaran','id_matapelajaran',$edit,$con);
    foreach ($data as $key => $value) {
      $kode = $value['kode_matapelajaran'];
      $nama = $value['matapelajaran'];
      $id_guru = $value['id_guru_matapelajaran'];
      $id_kelas = $value['id_kelas_matapelajaran'];
    }
    $submit = 'edit';
    $judul = 'Edit';
}

?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $judul; ?> Data Mata Pelajaran
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-laptop"></i> Master Data</a></li>
        <li class="active"><?php echo $judul; ?> data mata pelajaran</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
		<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form <?php echo $judul; ?> Data Mata Pelajaran</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="guru" action="proses/matapelajaran.php" name="guru" method="post">
              <input type="hidden" name="id" value="<?php echo $edit; ?>">
              <div class="box-body col-md-6">
              	<div class="form-group">
                  <label for="kode">Kode Pelajaran</label>
                  <input type="text" value="<?php echo $kode; ?>" class="form-control" id="kode" name="kode" placeholder="Isi Kode Pelajaran" required title="isi Kode Pelajaran">
                </div>
                <div class="form-group">
                  <label for="nama">Nama Pelajaran</label>
                  <input type="text" value="<?php echo $nama; ?>" class="form-control" id="nama" name="nama" placeholder="Isi Nama Pelajaran" required title="isi Nama Pelajaran">
                </div>
                <div class="form-group">
                  <label for="id_kelas">Kelas</label>
                  <?php
                      $data_kelas = $proses->getall('tbl_kelas',$con,'nama_kelas');
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
              <div class="form-group">
                  <label for="id_guru">Guru</label>
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


