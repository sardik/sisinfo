<?php
include "../koneksi/koneksi.php";
include "proses.php";
$db = new database;
$con = $db->koneksi();
$proses = new proses;

if (isset($_POST['simpan'])) {
  $query = "select * from tbl_matapelajaran where kode_matapelajaran = '".$_POST['kode']."' and id_kelas_matapelajaran = '".$_POST['id_kelas']."'";
  $cek = $proses->getquery($query,$con);
  if ($cek==null) {
     $data = array(
          'kode_matapelajaran' => "'".$_POST['kode']."'",
          'matapelajaran' => "'".$_POST['nama']."'",
          'id_kelas_matapelajaran' => "'".$_POST['id_kelas']."'",
          'id_guru_matapelajaran' => "'".$_POST['id_guru']."'"
          );
    $insert = $proses->insertdata('tbl_matapelajaran',$data,$con);
   if ($insert) {
         header('location:../?f=datamatapelajaran&&page=datamatapelajaran');
   }
  }else{
    header('location:../?f=datamatapelajaran&&page=datamatapelajaran&&message=gagal duplicate matapelajaran');
  }
 


}
if (isset($_POST['edit'])) {
    $data = array(
          'kode_matapelajaran' => $_POST['kode'],
          'matapelajaran' => $_POST['nama'],
          'id_kelas_matapelajaran' => $_POST['id_kelas'],
          'id_guru_matapelajaran' => $_POST['id_guru'],
          );
    $id = $_POST['id'];
    $update = $proses->updatedata('tbl_matapelajaran',$data,'id_matapelajaran',$id,$con);
    if ($update) {
      header('location:../?f=datamatapelajaran&&page=datamatapelajaran');
    }
}
if (isset($_GET['hapus'])) {
  $id=$_GET['hapus'];
  $hapus = $proses->delete('tbl_matapelajaran','id_matapelajaran',$id,$con);
  if ($hapus) {
    header('location:../?f=datamatapelajaran&&page=datamatapelajaran');
  }
}
?>