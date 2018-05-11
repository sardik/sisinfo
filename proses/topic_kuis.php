<?php
include "../koneksi/koneksi.php";
include "proses.php";
$db = new database;
$con = $db->koneksi();
$proses = new proses;

if (isset($_POST['simpan'])) {
     $ex = explode('-',$_POST['mapel'] );
     $id_mapel = $ex[0];
     $id_guru = $ex[1];
     $data = array(
          'id_matapelajaran_kuis' => "'".$id_mapel."'",
          'judul' => "'".$_POST['nama_topic']."'",
          'id_guru_kuis' => "'".$id_guru."'",
          'tgl_buat' => "'".$_POST['tanggal_dibuat']."'"
          );
    $insert = $proses->insertdata('tbl_topickuis',$data,$con);
    if ($insert) {
      header('location:../?f=kuis&&page=topickuis');
    }  
}

if (isset($_POST['edit'])) {
    $ex = explode('-',$_POST['mapel'] );
     $id_mapel = $ex[0];
     $id_guru = $ex[1];
    $data = array(
          'id_matapelajaran_kuis' => $id_mapel,
          'judul' => $_POST['nama_topic'],
          'id_guru_kuis' => $id_guru,
          'tgl_buat' => $_POST['tanggal_dibuat'],
          );
    $id = $_POST['id'];
    $update = $proses->updatedata('tbl_topickuis',$data,'id_topkuis',$id,$con);
    if ($update) {
      header('location:../?f=kuis&&page=topickuis');
    }
}
if (isset($_GET['hapus'])) {
  $id=$_GET['hapus'];
  $hapus = $proses->delete('tbl_topickuis','id_topkuis',$id,$con);
  if ($hapus) {
     $hapus = $proses->delete('tbl_kuis','id_topkuis',$id,$con);
     if ($hapus) {
       header('location:../?f=kuis&&page=topickuis');
     }
    
  }
}
?>