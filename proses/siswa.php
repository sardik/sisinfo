<?php
include "../koneksi/koneksi.php";
include "proses.php";
$db = new database;
$con = $db->koneksi();
$proses = new proses;

if (isset($_POST['simpan'])) {
  $query = "select nik from tbl_siswa order by nik DESC limit 1 ";
  $getLastNip = $proses->getquery($query,$con);
  if ($getLastNip != false) {
      $lastnip = $getLastNip[0]['nik'];
  }
  $nik = $lastnip + 1;
  $password = md5($nik);
  $data = array(
          'nik' => "'".$nik."'",
          'nama_siswa' => "'".$_POST['nama']."'",
          'alamat' => "'".$_POST['alamat']."'",
          'tempat_lahir' => "'".$_POST['tempat_lahir']."'",
          'tgl_masuk' => "'".$_POST['tanggal_masuk']."'",
          'tgl_lahir' => "'".$_POST['tanggal_lahir']."'",
          'jenis_kelamin' => "'".$_POST['jenis_kelamin']."'",
          'agama' => "'".$_POST['agama']."'",
          'email' => "'".$_POST['email']."'",
          'id_kelas_siswa' => "'".$_POST['id_kelas']."'",
          'foto' => "'".$_POST['foto_utama']."'",
          'no_telp' => "'".$_POST['nohp']."'"
          );
  $insert = $proses->insertdata('tbl_siswa',$data,$con);
 if ($insert) {
   $data_user = array('username' =>  "'".$nik."'",
                      'password' => "'".$password."'",
                      'nama_lengkap' => "'".$_POST['nama']."'",
                      'level' => "'2'"
                     );
   $insert_user = $proses->insertdata('tbl_user',$data_user,$con);
   if ($insert_user) {
       header('location:../?f=datasiswa&&page=datasiswa');
   }
 }


}
if (isset($_POST['edit'])) {
    $data = array(
          'nama_siswa' => $_POST['nama'],
          'alamat' => $_POST['alamat'],
          'tempat_lahir' => $_POST['tempat_lahir'],
          'foto' => $_POST['foto_utama'],
          'tgl_lahir' => $_POST['tanggal_lahir'],
          'tgl_masuk' => $_POST['tanggal_masuk'],
          'id_kelas_siswa' => $_POST['id_kelas'],
          'jenis_kelamin' => $_POST['jenis_kelamin'],
          'agama' => $_POST['agama'],
          'email' => $_POST['email'],
          'no_telp' => $_POST['nohp']
          );
    $id = $_POST['id'];
    $update = $proses->updatedata('tbl_siswa',$data,'id_siswa',$id,$con);
    if ($update) {
      header('location:../?f=datasiswa&&page=datasiswa');
    }
}
if (isset($_GET['hapus'])) {
  $id=$_GET['hapus'];
  $hapus = $proses->delete('tbl_siswa','nik',$id,$con);
  if ($hapus) {
    $hapus = $proses->delete('tbl_user','username',$id,$con);
    if ($hapus) {
      header('location:../?f=datasiswa&&page=datasiswa');
    }
  }
}
?>