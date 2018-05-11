<?php
include "../koneksi/koneksi.php";
include "proses.php";
$db = new database;
$con = $db->koneksi();
$proses = new proses;

if (isset($_POST['simpan'])) {
  $query = "select nip from tbl_guru order by nip DESC limit 1 ";
  $getLastNip = $proses->getquery($query,$con);
  if ($getLastNip != false) {
      $lastnip = $getLastNip[0]['nip'];
  }
  $nip = $lastnip + 1;
  $password = md5($nip);
  $data = array(
          'nip' => "'".$nip."'",
          'nama_lengkap' => "'".$_POST['nama']."'",
          'alamat' => "'".$_POST['alamat']."'",
          'tempat_lahir' => "'".$_POST['tempat_lahir']."'",
          'tgl_lahir' => "'".$_POST['tanggal_lahir']."'",
          'jenis_kelamin' => "'".$_POST['jenis_kelamin']."'",
          'agama' => "'".$_POST['agama']."'",
          'email' => "'".$_POST['email']."'",
          'foto' => "'".$_POST['foto_utama']."'",
          'no_telp' => "'".$_POST['nohp']."'"
          );
  $insert = $proses->insertdata('tbl_guru',$data,$con);
 if ($insert) {
   $data_user = array('username' =>  "'".$nip."'",
                      'password' => "'".$password."'",
                      'nama_lengkap' => "'".$_POST['nama']."'",
                      'level' => "'1'"
                     );
   $insert_user = $proses->insertdata('tbl_user',$data_user,$con);
   if ($insert_user) {
       header('location:../?f=dataguru&&page=dataguru');
   }
 }


}
if (isset($_POST['edit'])) {
    $data = array(
          'nama_lengkap' => $_POST['nama'],
          'alamat' => $_POST['alamat'],
          'tempat_lahir' => $_POST['tempat_lahir'],
          'foto' => $_POST['foto_utama'],
          'tgl_lahir' => $_POST['tanggal_lahir'],
          'jenis_kelamin' => $_POST['jenis_kelamin'],
          'agama' => $_POST['agama'],
          'email' => $_POST['email'],
          'no_telp' => $_POST['nohp']
          );
    $id = $_POST['id'];
    $update = $proses->updatedata('tbl_guru',$data,'id_guru',$id,$con);
    if ($update) {
    header('location:../?f=dataguru&&page=dataguru');
    }
}
if (isset($_GET['hapus'])) {
  $id=$_GET['hapus'];
  $hapus = $proses->delete('tbl_guru','nip',$id,$con);
  if ($hapus) {
    $hapus = $proses->delete('tbl_user','username',$id,$con);
    if ($hapus) {
      header('location:../?f=dataguru&&page=dataguru');
    }
  }
}
?>