<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['l_id']) && isset($_POST['pass'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$l_id = validate($_POST['l_id']);
	$pass = validate($_POST['pass']);

	if (empty($l_id)) {
		header("Location: admin_login_form.php?error=Login ID  is required");
	    exit();
	}else if(empty($pass)){
        header("Location: admin_login_form.php?error=password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM admin_ WHERE admin_id='$l_id' AND admin_password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['admin_id'] === $l_id && $row['admin_password'] === $pass) {
            	$_SESSION['admin_id'] = $row['admin_id'];
				$_SESSION['admin_name'] = $row['admin_name'];
            	$_SESSION['admin_password'] = $row['admin_password'];
            	header("Location: admin_info.php");
		        exit();
            }else{
				header("Location: admin_login_form.php?error=Incorect 1 Login Id or password");
		        exit();
			}
		}else{
			header("Location: admin_login_form.php?error=Incorect 2 Login Id or password");
	        exit();
		}
	}
	
}else{
	header("Location:admin_login_form.php");
	exit();
}