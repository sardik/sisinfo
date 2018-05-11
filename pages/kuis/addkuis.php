<?php

$judul = 'Tambah';
$pertanyaan = '';
$tanggal_dibuat = '';
$a = '';
$b = '';
$c = '';
$d = '';
$jawaban = '';
$submit = 'simpan';
$topic = $_GET['topic'];

if (isset($_GET['edit'])) {
    $edit = $_GET['edit'];
    $data = $proses->getone('tbl_kuis','id_kuis',$edit,$con);
    foreach ($data as $key => $value) {
      $pertanyaan = $value['pertanyaan'];
      $tanggal_dibuat = $value['tgl_dibuat'];
      $a = $value['pil_a'];
		$b = $value['pil_b'];
		$c = $value['pil_c'];
		$d = $value['pil_d'];
		$jawaban = $value['jawaban'];
    }
    $submit = 'edit';
    $judul = 'Edit';
}

?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $judul; ?> Kuis
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-laptop"></i> Modul Pembelajaran</a></li>
        <li class="active"><?php echo $judul; ?> kuis</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
		<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form <?php echo $judul; ?> Kuis</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="guru" action="proses/kuis.php" name="guru" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?php echo $edit; ?>">
              <input type="hidden" name="topickuis" value="<?php echo $topic; ?>">
              <div class="box-body col-md-6">
                <div class="form-group">
                  <label for="pertanyaan">Pertanyaan</label>
                  <input type="text" value="<?php echo $pertanyaan; ?>" class="form-control" id="pertanyaan" name="pertanyaan" placeholder="Isi Pertanyaan" required title="isi Pertanyaan">
                </div>
                <div class="form-group">
                  <label for="a">Pilihan A</label>
                  <input type="text" value="<?php echo $a; ?>" class="form-control" id="a" name="a" placeholder="Isi Pilihan A" required title="isi Pilihan A">
                </div>
                <div class="form-group">
                  <label for="b">Pilihan B</label>
                  <input type="text" value="<?php echo $b; ?>" class="form-control" id="b" name="b" placeholder="Isi Pilihan B" required title="isi Pilihan B">
                </div>
                <div class="form-group">
                  <label for="c">Pilihan C</label>
                  <input type="text" value="<?php echo $c; ?>" class="form-control" id="c" name="c" placeholder="Isi Pilihan C" required title="isi Pilihan C">
                </div>
                <button type="submit" class="btn btn-primary" name="<?php echo $submit; ?>">Submit</button>
            	</div>
            	<div class="box-body col-md-6">

                <div class="form-group">
                  <label for="d">Pilihan D</label>
                  <input type="text" value="<?php echo $d; ?>" class="form-control" id="d" name="d" placeholder="Isi Pilihan D" required title="isi Pilihan D">
                </div>
                <div class="form-group">
                  <label for="Jawaban">Jawaban</label>
                  <input type="text" value="<?php echo $jawaban; ?>" class="form-control" id="jawaban" name="jawaban" placeholder="Isi Jawaban" required title="isi Jawaban">
                </div>
              <div class="form-group">
                  <label for="tanggal_dibuat">Tanggal Dibuat</label>
                  <input type="text" value="<?php echo $tanggal_dibuat; ?>" class="form-control" id="datepicker" name="tanggal_dibuat" placeholder="Isi Tanggal Dibuat" required title="isi Tanggal Dibuat">
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


