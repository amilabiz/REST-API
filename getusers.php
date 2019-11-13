<?php
/**
 * Creates Unsynced rows data as JSON
 */
 
        
    include_once 'db_functions.php';
    $db = new DB_Functions();
	$dbf = new DB_Connect();
	$con = $dbf->connect();
    $users = $db->getUnSyncRowCount($con);
	$a = array();
	$b = array();
    if ($users != false){
		while ($row = mysqli_fetch_array($users)) {		
			$b["userId"] = $row["id"];
			$b["userFirstName"] = $row["fname"];
			$b["userLastName"] = $row["lname"];
                        $b["userEmail"] = $row["email"];
                        $b["userPassword"] = $row["password"];
			$b["role"] = $row["role"];
			$b["RF_ID"] = $row["rf_id"];
			array_push($a,$b);
		}
		echo json_encode($a);
	}
?>