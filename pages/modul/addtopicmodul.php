<?php

$judul = 'Tambah';
$nama_topic = '';
$id_mapel = '';
$tanggal_dibuat = '';
$submit = 'simpan';


if (isset($_GET['edit'])) {
    $edit = $_GET['edit'];
    $data = $proses->getone('tbl_topicmodul','id_topmodul',$edit,$con);
    foreach ($data as $key => $value) {
      $nama_topic = $value['judul'];
      $id_mapel = $value['id_matapelajaranmodul'];
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
        <?php echo $judul; ?> Topic Modul
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-laptop"></i> Modul Pembelajaran</a></li>
        <li class="active"><?php echo $judul; ?> topic modul</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
		<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form <?php echo $judul; ?> Topic Modul</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="guru" action="proses/topic_modul.php" name="guru" method="post">
              <input type="hidden" name="id" value="<?php echo $edit; ?>">
              <div class="box-body col-md-6">
                <div class="form-group">
                  <label for="nama_topic">Judul Topic</label>
                  <input type="text" value="<?php echo $nama_topic; ?>" class="form-control" id="nama_topic" name="nama_topic" placeholder="Isi Judul Topic" required title="isi Judul Topic">
                </div>
                <div class="form-group">
                  <label for="mapel">Mata Pelajaran</label>
                  <?php
                    if ($_SESSION['level'] == 1) {
                      $data_guru = $proses->getone('tbl_guru','nip',$_SESSION['username'],$con);
                      $data_mapel = $proses->getone('tbl_matapelajaran','id_guru_matapelajaran',$data_guru[0]['id_guru'],$con);
                    }else{
                        $data_mapel = $proses->getall('tbl_matapelajaran',$con,'kode_matapelajaran');
                    }
                  ?>
                  <select name="mapel" class="form-control">
                      <?php
                          foreach ($data_mapel as $key => $value) {
                      ?>
                      <option value="<?php echo $value['id_matapelajaran'].'-'.$value['id_guru_matapelajaran']; ?>" <?php if ($id_mapel == $value['id_matapelajaran']) {
                        echo "SELECTED";
                      } ?>><?php echo $value['matapelajaran']; ?></option>
                      <?php
                        }
                      ?>
                  </select>
              </div>
              <div class="form-group">
                  <label for="tanggal_dibuat">Tanggal Dibuat</label>
                  <input type="text" value="<?php echo $tanggal_dibuat; ?>" class="form-control" id="datepicker" name="tanggal_dibuat" placeholder="Isi Tanggal Dibuat" required title="isi Tanggal Dibuat">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary" name="<?php echo $submit; ?>">Submit</button>
                </div>
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


