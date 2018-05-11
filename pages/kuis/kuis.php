 <script type="text/javascript">
  function hapus(a,b) { 

	  if (confirm("Apakan Data Benar Akan Di Hapus ?") == true) {
			var id = a;
			var topic = b;
			var li = "proses/kuis.php?hapus="+id+"&&topic="+topic;
			window.location.href = li;
		}
  }
</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kuis
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-laptop"></i> Modul Pembelajaran</a></li>
        <li>Topic Kuis </li>
        <li class="active">Kuis </li>
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
                  <th>No</th>
                  <th>Pertanyaan </th>
                  <th>Pilihan A</th>
                  <th>Pilihan B</th>
                  <th>Pilihan C</th>
                  <th>Pilihan D</th>
                  <th>Jawaban</th>
                  <th>Tanggal Dibuat</th>
                  <th>Action</th>
                </tr>
                </thead>

                <tbody>
                  <?php
                    $no = 1;
                    $data = $proses->getone('tbl_kuis','id_topkuis',$_GET['topic'],$con);
                    if ($data != false) {
                      foreach ($data as $key => $value) {
                      echo "<tr>";
                      echo "<td> ".$no; 
                      echo "<td> ".$value['pertanyaan'];
                      echo "<td> ".$value['pil_a'];
                      echo "<td> ".$value['pil_b'];
                      echo "<td> ".$value['pil_c'];
                      echo "<td> ".$value['pil_d'];
                      echo "<td> ".$value['jawaban'];
                      echo "<td> ".$value['tgl_dibuat']; 
                      echo '<td> <a href="?f=kuis&&page=addkuis&&topic='.$_GET['topic'].'&&edit='.$value['id_kuis'].'"><button class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> </button></a>';?>
                        <a href="javascript:hapus('<?php echo $value['id_kuis']; ?>','<?php echo $_GET['topic']; ?>');"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> </button></a> 
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
          <a href="?f=kuis&&page=addkuis&&topic=<?php echo $_GET['topic'];?>"><button class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Tambah Kuis</button></a>
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


