<?php
include "../koneksi/koneksi.php";
include "proses.php";
$db = new database;
$con = $db->koneksi();
$proses = new proses;
if (isset($_POST['periode'])) {
	$agen = $_POST['agen'];
	$sales = $_POST['sales'];
	$periode =  $_POST['periode'];

	$max = count(array_values($agen));
	for ($i=0; $i < $max ; $i++) { 
		echo $agen[$i]." ".$i."<br>";
		$data = array(
	          'agen' => "'".$agen[$i]."'",
	          'sales' => "'".$sales."'",
	          'periode' => "'".$periode."'",
	          'status' => "'n'"
	          );
		$insert = $proses->insertdata('jadwal',$data,$con);
	}
	header('location:../jadwal/editjadwal/periode/'.$_POST['periode']);
}
if (isset($_POST['edit'])) {
	echo $_POST['sales'];
	echo $_POST['id'];

	$data = array(
          'sales' => $_POST['sales']
          );
    $id = $_POST['id'];
    $update = $proses->updatedata('jadwal',$data,'id',$id,$con);
    if ($update) {
    header('location:../jadwal/editjadwal/periode/'.$_POST['periode']);
    }
}

?>