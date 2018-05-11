<?php
class database {
	function koneksi () {
	$koneksi = mysqli_connect('sql12.freesqldatabase.com','sql12237101','3P3zdMvkdE','sql12237101');
	return $koneksi;
	}
}
?>
