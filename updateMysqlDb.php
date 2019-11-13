<?php
/**
 * Updates Sync status of Users
 */
include_once './db_functions.php';

//Create Object for DB_Functions clas
$db = new DB_Functions(); 
$dbf = new DB_Connect();
$con = $dbf->connect();

$json = $_POST["userDetails"];

//Remove Slashes
if (get_magic_quotes_gpc()){
$json = stripslashes($json);
}
//Decode JSON into an Array
$data = json_decode($json);

//Store User into MySQL DB
$res = $db->updateMySQLDb($data[0], $data[1], $data[2], $data[3], $data[4]);

	//Based on inserttion, create JSON response
	if($res){
		$status = "Success";
	}else{
		$status = "Failed";
	}

//Post JSON response back to Android Application
echo json_encode(array("Important"=>$status));
?>