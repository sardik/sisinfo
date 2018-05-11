<?php
include "../koneksi/koneksi.php";
include "proses.php";
$db = new database;
$con = $db->koneksi();
$proses = new proses;

if (isset($_POST['simpan'])) {
  $data = array(
          'id_topkuis' => "'".$_POST['topickuis']."'",
          'pertanyaan' => "'".$_POST['pertanyaan']."'",
          'pil_a' => "'".$_POST['a']."'",
          'pil_b' => "'".$_POST['b']."'",
          'pil_c' => "'".$_POST['c']."'",
          'pil_d' => "'".$_POST['d']."'",
          'jawaban' => "'".$_POST['jawaban']."'",
          'tgl_dibuat' => "'".$_POST['tanggal_dibuat']."'"
          );
  $insert = $proses->insertdata('tbl_kuis',$data,$con);
 if ($insert) {
    header('location:../?f=kuis&&page=kuis&&topic='.$_POST['topickuis']);
 }

}
if (isset($_POST['edit'])) {
    $data = array(
          'id_topkuis' => $_POST['topickuis'],
          'pertanyaan' => $_POST['pertanyaan'],
          'pil_a' => $_POST['a'],
          'pil_b' => $_POST['b'],
          'pil_c' => $_POST['c'],
          'pil_d' => $_POST['d'],
          'jawaban' => $_POST['jawaban'],
          'tgl_dibuat' => $_POST['tanggal_dibuat']
          );
    $id = $_POST['id'];
    $update = $proses->updatedata('tbl_kuis',$data,'id_kuis',$id,$con);
    if ($update) {
      header('location:../?f=kuis&&page=kuis&&topic='.$_POST['topickuis']);
    }
}
if (isset($_GET['hapus'])) {
  $id=$_GET['hapus'];
  $topic=$_GET['topic'];
	 $hapus = $proses->delete('tbl_kuis','id_kuis',$id,$con);
	 if ($hapus) {
	   header('location:../?f=kuis&&page=kuis&&topic='.$_POST['topickuis']);
	 }   
}
?>