<?php
session_start();
        include('connection.php');
        $remarks=-1;
        $username=trim($_POST['username']);

        $query = "SELECT id FROM tp_users WHERE username = '".$username."'";

        $stmt = $mysqli->prepare( $query );
        $stmt->execute();
        $stmt->store_result();
        $num= $stmt->num_rows;
        $stmt->close();

        if($num>0) $remarks=1;

        else{

            $password=md5(trim($_POST['password']));
            $date = new DateTime('now', new DateTimeZone('Asia/Tokyo'));

            $query = "INSERT INTO tp_users (username,password) VALUES ('".$username."','".$password."')";

            $stmt = $mysqli->prepare( $query );
            $stmt->execute();
            $stmt->close();
            $remarks=0;
        }
        header("location: register.php?remarks=".$remarks);
?>