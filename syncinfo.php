<?php 

require 'db_connect.php';

$db = new DB_Connect();
 
$con = $db->connect();
if($con){
	
	$firstName = $_POST['fname'];
	$lastName = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
        $role = $_POST['role'];
	$RF_ID = addslashes($_POST['rf_id']);
	
	$stmt = $con->prepare("INSERT INTO users (fname, lname, email, password, role, rf_id) VALUES (?,?,?,?,?,?)");
	$stmt->bind_param("ssssss",$firstName, $lastName, $email, $password, $role, $RF_ID);
	
	if($stmt->execute()){
		$status = 'User added to database successfully....Please generate QR/Bar code using => '.$RF_ID;
	}
	else{
		$status = 'FAILED';
	}
}
else{
	$status = 'FAILED_CONNECT';
}
mysqli_close($con);
echo json_encode(array("Important"=>$status));


	

?>