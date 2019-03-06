<?php
class DBController {
	private $host = "localhost";
	private $user = "jay";
	private $password = "jay123";
	private $database = "tp";
	
	private static $conn;
	
	function __construct() {
		self::$conn = $this->connectDB();
		if(!empty($this->conn)) {
		    $this->selectDB();
		}
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
	
	function selectDB() {
	    mysqli_select_db(self::$conn, $this->database);
	}
	
	function runQuery($query) {
	    $result = mysqli_query(self::$conn, $query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
	    $result  = mysqli_query(self::$conn, $query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
	
	function insert($query) {
	    $insert_id = "";
	    $result  = mysqli_query(self::$conn, $query);
	    if(!empty($result)) {
	        $insert_id = mysqli_insert_id(self::$conn);
	    }
	    return $insert_id;
	}
	
	function execute($query) {
	    $result  = mysqli_query(self::$conn, $query);
	    return $result;
	}
}
?>