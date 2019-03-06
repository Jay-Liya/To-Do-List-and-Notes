<?php

class login_class {

	//ENCRYPTION CENTER
	var $domain_code = '';
	var $today_ts = '';
	var $today_m = '';
	var $error_message = NULL;
	var $users = '';
	var $num_1 = '';
	var $num_2 = '';
	var $num_3 = '';
	var $username = '';

	function verify_settings () {
		$verified = TRUE;

		//Num 1 between 1 - 500
		if ($this->num_1<1 || $this->num_1>500) $verified = FALSE;
		elseif ($this->num_2<500 || $this->num_2>1000) $verified = FALSE;
		elseif ($this->num_3<1 || $this->num_3>5) $verified = FALSE;

		foreach ($this->users as $user => $pass) {
			//Usernames
			preg_match('/([^A-Za-z0-9-_\s\s+])/', $user, $user_result_{$user});

			if (!empty($user_result_{$user})) $verified = FALSE;

		}

		return $verified;
	}

	function encryption_key ($user) {

		//Encryption Key One
		$key_uid = $this->user_encryption($user);

		//Encrption Key Two
		$key_cid = $this->code_encryption($key_uid);

		//Set Keys
		setcookie($this->domain_code.'_uid', $key_uid, time() + (86400 * 5));
		setcookie($this->domain_code.'_cid', $key_cid, time() + (86400 * 5));	
		setcookie('username', $this->cleanse_input($user), time() + (86400 * 5));
	}

	function user_encryption ($user) {
		//Array of Characters
		return md5($user);
	}

	function code_encryption ($key_cid, $encrypt = 1) {
		if ($encrypt == 1) {
			$key_code = preg_replace('/([^0-9+])/', '', $key_cid);

			switch ($this->num_3) {
				case 1:
					$key_code = floor((($key_code + $this->num_2 + (($this->num_1 * 2) * $this->num_2)) / $this->num_1) / $this->num_2);
					break;
				case 2:
					$key_code = ceil(((($this->num_2 + $this->num_1) * $this->num_1 + $key_code + $this->num_2 - (10 * $this->num_1)) / ($this->num_1 * 50))/100000000);
					break;
				case 3:
					$key_code = floor((((($key_code - $this->num_2 + (($this->num_1 * 3) * $this->num_2)) + $this->num_1) / $this->num_2))/100000000);
					break;
			}

			$key_code = substr($key_code, 0, 10);

			return $key_code;
		}
	}

	function check_login ($username, $password) {
		//Check Login
        include('connection.php');
        $query = "SELECT id FROM tp_users WHERE username = '".trim($username)."' and password = '".md5(trim($password))."'";

        $stmt = $mysqli->prepare( $query );
        $stmt->execute();
        $stmt->store_result();
        $num= $stmt->num_rows;
        $stmt->close();

        if($num>0) return TRUE;
  
        else return FALSE;
        
	}

	function verify_login ($key_uid, $key_cid) {

        if ($key_cid = $this->code_encryption($key_uid)) {

          include('connection.php');
          $query = "SELECT id FROM tp_users WHERE username = '".$key_uid."' and password = '".md5($key_cid)."'";

          $stmt = $mysqli->prepare( $query );
          $stmt->execute();
          $stmt->store_result();
          $num= $stmt->num_rows;
          $stmt->close();

          if($num>0)
            return TRUE;

          else return FALSE;
        }
        
        else return FALSE;
	}

	function error_login () {
		if (isset($this->error_message)) {
			echo '<span class="error">'.$this->error_message.'</span><br /><br />';
		}
	}

	function cleanse_input($input) {
		//Trim
		$input = trim($input);

		if (get_magic_quotes_gpc()==1) {
			//Null
		} else {
			//Escape Codes
			$input = addslashes($input);
		}

		//If Html Entities
		$input = htmlentities($input);

		return $input;
	}

}

?>