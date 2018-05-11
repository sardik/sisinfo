<?php
session_start();
include "../koneksi/koneksi.php";
include "proses.php";
include '../config.php';
$db = new database;
$con = $db->koneksi();
$proses = new proses;

if (isset($_POST['login'])) {
	echo "string";
	$user = $_POST['username'];
	$pas = md5($_POST['password']);

	$login = $proses->cek('tbl_user','username','password',$user,$pas,$con);
	if ($login == false) {
		$_SESSION['massage'] = "Username atau Password Salah";
		header('location: ../login.php');
	}else{
		foreach ($login  as $key => $value) {
			$_SESSION['nama'] = $value['nama_lengkap'];
			$_SESSION['level'] = $value['level'];
			$_SESSION['username'] = $value['username'];
			$_SESSION['id'] = $value['id_user'];
			if ($_SESSION['level'] > 1) {
				$_SESSION['login'] = false;
				$_SESSION['massage'] = "Siswa tidak bisa login";
				header('location: ../login.php');	
			}else{
				$_SESSION['login'] = true;
				header('location: ../index.php');
			}
			
		}

	}
}

?>

