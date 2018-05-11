<?php
include "../koneksi/koneksi.php";
include "proses.php";
$db = new database;
$con = $db->koneksi();
$proses = new proses;

if (isset($_POST['simpan'])) {
  $data = array(
          'nama_kelas' => "'".$_POST['nama']."'",
          'id_guru_walikelas' => "'".$_POST['id_guru']."'"
          );
  $insert = $proses->insertdata('tbl_kelas',$data,$con);
 if ($insert) {
       header('location:../?f=kuis&&page=kuis&&topic='.$_POST['topickuis']);
 }


}
if (isset($_POST['edit'])) {
    $data = array(
          'nama_kelas' => $_POST['nama'],
          'id_guru_walikelas' => $_POST['id_guru'],
          );
    $id = $_POST['id'];
    $update = $proses->updatedata('tbl_kelas',$data,'id_kelas',$id,$con);
    if ($update) {
      header('location:../?f=datakelas&&page=datakelas');
    }
}
if (isset($_GET['hapus'])) {
  $id=$_GET['hapus'];
  $hapus = $proses->delete('tbl_kelas','id_kelas',$id,$con);
  if ($hapus) {
    header('location:../?f=datakelas&&page=datakelas');
  }
}
?>