<?php
 
ServerConfig();
define ('SITE_ROOT', realpath(dirname(__FILE__)));
 
if($_SERVER['REQUEST_METHOD']=='POST'){
 
    if(isset($_POST['name']) and isset($_FILES['image']['name']) and isset($_POST['username']) and isset($_POST['level']) ){
    $con = mysqli_connect(HostName,HostUser,HostPass,DatabaseName);
		
        $fotoName = $_POST['name'];
        $fotoInfo = pathinfo($_FILES['image']['name']);
        $username = $_POST['username'];
        $level = $_POST['level'];
        $fotoInfoExtension = $fotoInfo['extension'];
        $uploadfile = $_SERVER['DOCUMENT_ROOT'] . '/foto/'.$fotoName.'.'.$fotoInfoExtension;
        
 
        try{
            move_uploaded_file($_FILES['image']['tmp_name'],$uploadfile);
			if ($level == "2") {
                $UpdateTableSQLQuery = "Update tbl_siswa set `foto` = 'foto/$fotoName.$fotoInfoExtension' where nik = '".$username."'";     
            }else if ($level == "1"){
                $UpdateTableSQLQuery = "Update tbl_guru set `foto` = 'foto/$fotoName.$fotoInfoExtension' WHERE `nip` = '".$username."'";

            }
           
            mysqli_query($con,$UpdateTableSQLQuery);
        }catch(Exception $e){} 
        mysqli_close($con);
		
    }
}
function ServerConfig(){
	
define('HostName','mirrorsfa.tk');
define('HostUser','sar');
define('HostPass','s4r');
define('DatabaseName','sar');
// define('HostName', 'localhost');
// define('HostUser', 'root');
// define('HostPass', '');
// define('DatabaseName', 'db_sistem_informasi_siswa');
	
}
?>
