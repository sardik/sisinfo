<?php
include "../koneksi/koneksi.php";
include "proses.php";
$db = new database;
$con = $db->koneksi();
$proses = new proses;

if (isset($_GET['hapus'])) {
    $data = array(
          'status' => 0
          );
    $id=$_GET['hapus'];
    $update = $proses->updatedata('tbl_pengaduan',$data,'id_pengaduan',$id,$con);
    if ($update) {
      header('location:../?f=pengaduan&&page=pengaduan');
    }else{
      header('location:../?f=pengaduan&&page=pengaduan&&massage=gagal');
    }
}

?>