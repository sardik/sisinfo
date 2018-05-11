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
          'id_matapelajaranmodul' => "'".$id_mapel."'",
          'judul' => "'".$_POST['nama_topic']."'",
          'id_gurumodul' => "'".$id_guru."'",
          'tgl_dibuat' => "'".$_POST['tanggal_dibuat']."'"
          );
    $insert = $proses->insertdata('tbl_topicmodul',$data,$con);
    if ($insert) {
      header('location:../?f=modul&&page=topicmodul');
    }  
}

if (isset($_POST['edit'])) {
    $ex = explode('-',$_POST['mapel'] );
     $id_mapel = $ex[0];
     $id_guru = $ex[1];
    $data = array(
          'id_matapelajaranmodul' => $id_mapel,
          'judul' => $_POST['nama_topic'],
          'id_gurumodul' => $id_guru,
          'tgl_dibuat' => $_POST['tanggal_dibuat'],
          );
    $id = $_POST['id'];
    $update = $proses->updatedata('tbl_topicmodul',$data,'id_topmodul',$id,$con);
    if ($update) {
      header('location:../?f=modul&&page=topicmodul');
    }
}
if (isset($_GET['hapus'])) {
  $id=$_GET['hapus'];
  $hapus = $proses->delete('tbl_topicmodul','id_topmodul',$id,$con);
  if ($hapus) {
     $hapus = $proses->delete('tbl_modul','id_topic_modul',$id,$con);
     if ($hapus) {
       header('location:../?f=modul&&page=topicmodul');
     }
    
  }
}
?>