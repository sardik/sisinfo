<?php
include "../koneksi/koneksi.php";
include "proses.php";
$db = new database;
$con = $db->koneksi();
$proses = new proses;

if (isset($_POST['simpan'])) {
  $data = array(
          'username' => "'".$_POST['username']."'",
          'password' => "'".md5($_POST['password'])."'",
          'nama_lengkap' => "'".$_POST['nama']."'",
          'level' => "'0'"
        
          );
  $insert = $proses->insertdata('tbl_user',$data,$con);
 if ($insert) {
   header('location:../?f=admin&&page=dataadmin');
 }else{
  header('location:../?f=admin&&page=dataadmin&&massage=gagal');
 }


}
if (isset($_POST['edit'])) {
    $data = array(
          'username' => $_POST['username'],
          'password' => md5($_POST['password']),
          'nama_lengkap' => $_POST['nama']
          );
    $id = $_POST['id'];
    $update = $proses->updatedata('tbl_user',$data,'id_user',$id,$con);
    if ($update) {
      header('location:../?f=admin&&page=dataadmin');
    }else{
      header('location:../?f=admin&&page=dataadmin&&massage=gagal');
    }
}
if (isset($_GET['hapus'])) {
  $id=$_GET['hapus'];
  $hapus = $proses->delete('tbl_user','id_user',$id,$con);
  if ($hapus) {
    header('location:../?f=admin&&page=dataadmin');
    }else{
      header('location:../?f=admin&&page=dataadmin&&massage=gagal');
    }
}
?>
