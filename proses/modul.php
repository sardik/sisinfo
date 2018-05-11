<?php
include "../koneksi/koneksi.php";
include "proses.php";
$db = new database;
$con = $db->koneksi();
$proses = new proses;

if (isset($_POST['simpan'])) {
	$nama_file	=$_FILES['filemodul']['name'];
	$tipe_file	=$_FILES['filemodul']['type'];
	$ukuran_file=$_FILES['filemodul']['size'];
	$lokasi_file	=$_FILES['filemodul']['tmp_name'];
	$direktori_file ="../files/$nama_file";
	if($ukuran_file>0){
	//upload file
		if ($tipe_file=="application/pdf") {
			$hasil = move_uploaded_file($lokasi_file,$direktori_file) or die ($lokasi_file);
			if ($hasil) {
				$data = array(
		          'nama_modul' => "'".$_POST['nama']."'",
		          'tgl_dibuat' => "'".$_POST['tanggal_dibuat']."'",
		          'id_topic_modul' => "'".$_POST['topicmodul']."'",
		          'link_file' => "'files/".$nama_file."'",
		          );
			    $insert = $proses->insertdata('tbl_modul',$data,$con);
			    if ($insert) {
			      header('location:../?f=modul&&page=modul&&topic='.$_POST['topicmodul']);
			    }  
			}else{
				header('location:../?f=modul&&page=modul&&message=gagal upload files&&topic='.$_POST['topicmodul']);
			}
		}else{
			header('location:../?f=modul&&page=addmodul&&message=Files Harus PDF&&topic='.$_POST['topicmodul']);
		}
	}
     
}

if (isset($_POST['edit'])) {
    $nama_file	=$_FILES['filemodul']['name'];
	$tipe_file	=$_FILES['filemodul']['type'];
	$ukuran_file=$_FILES['filemodul']['size'];
	$lokasi_file	=$_FILES['filemodul']['tmp_name'];
	$direktori_file ="../files/$nama_file";
	if($ukuran_file>0){
	//upload file
		if ($tipe_file=="application/pdf") {
			$hasil = move_uploaded_file($lokasi_file,$direktori_file) or die ($lokasi_file);
			if ($hasil) {
				$data = array(
			          'nama_modul' => $_POST['nama'],
			          'tgl_dibuat' => $_POST['tanggal_dibuat'],
			          'id_topic_modul' => $_POST['topicmodul'],
			          'link_file' => 'files/'.$nama_file,
			          );
			    $id = $_POST['id'];
			    $update = $proses->updatedata('tbl_modul',$data,'id_modul',$id,$con);
			    if ($update) {
			      header('location:../?f=modul&&page=modul&&topic='.$_POST['topicmodul']);
			    }
			}
		}else{
			header('location:../?f=modul&&page=addmodul&&message=Files Harus PDF&&topic='.$_POST['topicmodul']);
		}
	}else{
		$data = array(
		          'nama_modul' => $_POST['nama'],
		          'tgl_dibuat' => $_POST['tanggal_dibuat'],
		          'id_topic_modul' => $_POST['topicmodul'],
		          );
		$id = $_POST['id'];
		$update = $proses->updatedata('tbl_modul',$data,'id_modul',$id,$con);
		if ($update) {
		    header('location:../?f=modul&&page=modul&&topic='.$_POST['topicmodul']);
		}
	}
    
}
if (isset($_GET['hapus'])) {
  $id=$_GET['hapus'];
  $topic=$_GET['topic'];
	 $hapus = $proses->delete('tbl_modul','id_modul',$id,$con);
	 if ($hapus) {
	   header('location:../?f=modul&&page=modul&&topic='.$topic);
	 }
    
}
?>