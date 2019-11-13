<?php
/**
 * DB operations functions
 */
class DB_Functions {

    private $db;
	
    //put your code here
    // constructor
    function __construct() {
        include_once './db_connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        
    }
	
    // destructor
    function __destruct() {

    }

    /**
     * Storing new user
     * returns user details
     */
    public function storeUser($User) {
        // Insert user into database
        $result = mysqli_query($this->db->connect(),"INSERT INTO user(Name) VALUES('$User')");

		mysqli_close($con);
        if ($result) {
			return true;
        } else {			
				// For other errors
				return false;
		}
    }
	 /**
     * Getting all users
     */
    public function getAllUsers() {
        $result = mysqli_query($this->db->connect(),"select * FROM users");
		
        return $result;
    }
	/**
     * Get Yet to Sync row Count
     */
    public function getUnSyncRowCount() {
        $result = mysqli_query($this->db->connect(),"SELECT * FROM users WHERE syncsts = FALSE");
		
        return $result;
    }
	
	/**
	 * Update Sync status of rows
	 */
	public function updateSyncSts($id, $sts){
		
		$sql = "UPDATE users SET syncsts = '$sts' WHERE id = '$id'";
		$result = mysqli_query($this->db->connect(),$sql);
		
		return $result;
	}
        
        /*
        * Update MySQLDb
        */
        public function updateMySQLDb($id, $fname,$lname,$email,$password){
        
                $sql = "UPDATE `users` SET `fname` = '".$fname."',`lname` = '".$lname."',`email` = '".$email."',`password` = '".$password."' WHERE id = ".$id;
		$result = mysqli_query($this->db->connect(),$sql);
		
		return $result;
        }
}

?>