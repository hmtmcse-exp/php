<?php
if(!empty($_FILES)){
	
	//database configuration
	$dbHost = 'localhost';
	$dbUsername = 'root';
	$dbPassword = '';
	$dbName = 'codexworld';
	//connect with the database
//	$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
//	if($mysqli->connect_errno){
//		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
//	}
	
	$targetDir = "uploads/";
	$fileName = $_FILES['file']['name'];
	$targetFile = $targetDir.$fileName;

	echo $_FILES['file']['tmp_name'];
	print_r($_FILES['file']);
	echo  ini_get('upload_tmp_dir');

	if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile)){
		//insert file information into db table
	//	$conn->query("INSERT INTO files (file_name, uploaded) VALUES('".$fileName."','".date("Y-m-d H:i:s")."')");
	}
	
}
?>