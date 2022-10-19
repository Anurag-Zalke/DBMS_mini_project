<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['s_id']) && isset($_POST['mobile'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$s_id = validate($_POST['s_id']);
	$mobile = validate($_POST['mobile']);

	if (empty($s_id)) {
		header("Location: student_login_form.php?error=Student ID  is required");
	    exit();
	}else if(empty($mobile)){
        header("Location: student_login_form.php?error=mobile number is required");
	    exit();
	}else{
		$sql = "SELECT * FROM student_info WHERE roll_number='$s_id' AND mobile_number='$mobile'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['roll_number'] === $s_id && $row['mobile_number'] === $mobile) {
            	$_SESSION['roll_number'] = $row['roll_number'];
            	$_SESSION['mobile_number'] = $row['mobile_number'];
            	// $_SESSION['id'] = $row['id'];
            	header("Location: student_info.php");
		        exit();
            }else{
				header("Location: student_login_form.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: student_login_form.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location:student_login_form.php");
	exit();
}