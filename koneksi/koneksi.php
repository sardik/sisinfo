<?php
class database {
	function koneksi () {
	$koneksi = mysqli_connect('mirrorsfa.tk','sar','s4r','sar');
	return $koneksi;
	}
}
?>