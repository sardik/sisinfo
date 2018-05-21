<?php
 
ServerConfig();
define ('SITE_ROOT', realpath(dirname(__FILE__)));
 
if($_SERVER['REQUEST_METHOD']=='POST'){
 
    if(isset($_POST['name']) and isset($_FILES['pdf']['name']) and isset($_POST['id_topic_modul']) and isset($_POST['modul_name']) and isset($_POST['date']) ){
    $con = mysqli_connect(HostName,HostUser,HostPass,DatabaseName);
		
        $PdfName = $_POST['name'];
        $PdfInfo = pathinfo($_FILES['pdf']['name']);
        $PdfIdTopicModul = $_POST['id_topic_modul'];
        $PdfModulName = $_POST['modul_name'];
        $date = $_POST['date'];
        $PdfFileExtension = $PdfInfo['extension'];
        $uploadfile = $_SERVER['DOCUMENT_ROOT'] . '/files/'.$PdfName.'.'.$PdfFileExtension;
        
 
        try{
            move_uploaded_file($_FILES['pdf']['tmp_name'],$uploadfile);
			
            $InsertTableSQLQuery = "INSERT INTO tbl_modul (id_topic_modul, nama_modul, tgl_dibuat, link_file) VALUES ('$PdfIdTopicModul', '$PdfModulName', '$date','files/$PdfName.$PdfFileExtension') ;";
            mysqli_query($con,$InsertTableSQLQuery);
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
