<?php 
	$hapus = $_GET['hapus'];
   $hapus_file ="../".$hapus;
	unlink($hapus_file);
?>