<?php
$nama_file	=$_FILES['foto_1']['name'];
$tipe_file	=$_FILES['foto_1']['type'];
$ukuran_file=$_FILES['foto_1']['size'];
$lokasi_file	=$_FILES['foto_1']['tmp_name'];
$direktori_file ="../foto/$nama_file";
		
$error ='';
if($ukuran_file>0){
	if(	$tipe_file != "image/gif" AND
		$tipe_file != "image/jpg" AND
		$tipe_file != "image/png" AND
		$tipe_file != "image/jpeg") :
		echo '<p>Tipe file  <b>'.$tipe_file.'</b> tidak diperbolehkan. Tipe file yang diperbolehkan <b>*gif, *jpg, *jpg, atau *jpeg</b>!</p>';
		exit();
		endif;


//upload file
move_uploaded_file($lokasi_file,$direktori_file);

//tampilkan file hasil upload
echo '<img src="foto/'.$nama_file.'" alt="file upload" width="50" height="50" style="border:1px solid; border-radius:2px; padding:1px;">';
echo "<input type='hidden' name='foto_utama' value='foto/$nama_file' id='foto_utama'>";

}


?>
