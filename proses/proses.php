<?php

class proses {
	 function getall ($table,$con,$order) {
		$sql = "Select * From $table ORDER BY $order ASC ";
		$query = mysqli_query($con,$sql);
		$cek = mysqli_num_rows($query);
		while ($q = mysqli_fetch_array($query)){
			$data[] = $q;
		}
		if ($cek>0){
		return $data;
		}
		else {
			$cek = false;
			return $cek;
		}
	 }
	 function getquery($sql, $con){
		$query = mysqli_query($con,$sql);
		$cek = mysqli_num_rows($query);
		while ($q = mysqli_fetch_array($query)){
			$data[] = $q;
		}
		if ($cek>0){
		return $data;
		}
		else {
			$cek = false;
			return $cek;
		}
	 }
	 function insertdata ($table,$data,$con){
	 	$columns = implode(", ",array_keys($data));
		$values  = implode(", ", array_values($data));
	 	$sql = "INSERT INTO $table ($columns) VALUES ($values)";
	 	echo $sql;
		$query = mysqli_query($con,$sql)or die(mysql_error());
		return $query;
	 }
	 function updatedata ($table,$data,$where,$id,$con){
 	    foreach ($data as $key => $value) {
            $value = "'$value'";
            $updates[] = "$key = $value";
        }
        $update = implode(', ', $updates);
	 	$sql = "UPDATE $table SET $update WHERE $where = '$id'"; 
	 	echo $sql;
		$query = mysqli_query($con,$sql);
		return $query;
	 }
	 function getlimits($table,$order,$mulai,$batas,$con) {

		$sql = "Select * From $table ORDER BY $order ASC LIMIT $mulai, $batas";
		$query = mysqli_query($con,$sql);
		$cek = mysqli_num_rows($query);
		while ($q = mysqli_fetch_array($query)){
			$data[] = $q;
		}
		if ($cek>0){
		return $data;
		}
		else {
			$cek = false;
			return $cek;
		}
	 }
	 function getone($table,$field,$id,$con){
	 	$sql = "Select * From $table where $field = '$id' ";
		$query = mysqli_query($con,$sql);
		$cek = mysqli_num_rows($query);
		while ($q = mysqli_fetch_array($query)){
			$data[] = $q;
		}
		if ($cek>0){
		return $data;
		}
		else {
			$cek = false;
			return $cek;
		}
	 }
	 function getonelimits($table,$field,$id,$mulai,$batas,$con){
	 	$sql = "Select * From $table where $field = '$id' LIMIT $mulai, $batas";
		$query = mysqli_query($con,$sql);
		$cek = mysqli_num_rows($query);
		while ($q = mysqli_fetch_array($query)){
			$data[] = $q;
		}
		if ($cek>0){
		return $data;
		}
		else {
			$cek = false;
			return $cek;
		}
	 }
	 function cek($table,$filed1,$filed2,$id1,$id2,$con){
	 	$sql = "Select * From $table where $filed1 = '$id1' AND $filed2 ='$id2' ";
		$query = mysqli_query($con,$sql);
		$cek = mysqli_num_rows($query);
		while ($q = mysqli_fetch_array($query)){
			$data[] = $q;
		}
		if ($cek>0){
		return $data;
		}
		else {
			$cek = false;
			return $cek;
		}
	 }
	 function delete($table,$field,$id,$con) {
		$sql = "DELETE FROM $table WHERE $field = '$id'";
		$query = mysqli_query($con,$sql);
		return $query;
	 }
	 function gettotal ($table,$field,$con){
		 	$sql="SELECT sum($field) AS total FROM $table";
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_assoc($result); 
			$sum = $row['total'];
			return $sum;
	 }
	 function gettotalone($nim,$table,$field,$fieldket,$id,$con){
		 	$sql="SELECT sum($field) AS total FROM $table where $fieldket = '$id'";
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_assoc($result); 
			$sum = $row['total'];
			return $sum;
	 }
	 function gettotaltwo($nim,$table,$field,$fieldket,$id,$fieldket2,$id2,$con){
		 	$sql="SELECT sum($field) AS total FROM $table where $fieldket = '$id' AND $fieldket2 = '$id2'";
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_assoc($result); 
			$sum = $row['total'];
			return $sum;
	 }


}
?>