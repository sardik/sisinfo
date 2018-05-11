<?php
include "../koneksi/koneksi.php";
include "proses.php";
$db = new database;
$con = $db->koneksi();
$proses = new proses;

if (isset($_POST['simpan'])) {
$lat1 = explode("(", $_POST['latlong']);
$lat2 = explode(",", $lat1[1]);
$lat = $lat2[0];
$lat3 = explode(")", $lat2[1]);
$long = $lat3[0];
  $data = array(
          'nama' => "'".$_POST['nama']."'",
          'alamat' => "'".$_POST['alamat']."'",
          'nohp' => "'".$_POST['nohp']."'",
          'lat' => "'".$lat."'",
          'lang' => "'".$long."'",
          );
  $insert = $proses->insertdata('agen',$data,$con);
 if ($insert) {
   header('location:../dataagen/dataagen');
 }


}
if (isset($_POST['edit'])) {
	$lat1 = explode("(", $_POST['latlong']);
$lat2 = explode(",", $lat1[1]);
$lat = $lat2[0];
$lat3 = explode(")", $lat2[1]);
$long = $lat3[0];
    $data = array(
          'nama' => $_POST['nama'],
          'alamat' => $_POST['alamat'],
          'nohp' => $_POST['nohp'],
           'lat' => $lat,
          'lang' => $long,
          );
    $id = $_POST['id'];
    $update = $proses->updatedata('agen',$data,'id',$id,$con);
    if ($update) {
    header('location:../dataagen/dataagen');
    }
}
if (isset($_GET['hapus'])) {
  $id=$_GET['hapus'];
  $hapus = $proses->delete('agen','id',$id,$con);
  if ($hapus) {
    header('location:../dataagen/dataagen');
  }
}
?>