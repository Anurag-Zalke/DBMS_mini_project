<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['e_id']) && isset($_POST['mobile'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$e_id = validate($_POST['e_id']);
	$mobile = validate($_POST['mobile']);

	if (empty($e_id)) {
		header("Location: Instructor_login_form.php?error=Instructor ID  is required");
	    exit();
	}else if(empty($mobile)){
        header("Location: Instructor_login_form.php?error=mobile number is required");
	    exit();
	}else{
		$sql = "SELECT * FROM Instructor WHERE instructor_id='$e_id' AND mobile_number='$mobile'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['instructor_id'] === $e_id && $row['mobile_number'] === $mobile) {
            	$_SESSION['instructor_id'] = $row['instructor_id'];
				$_SESSION['instructor_name'] = $row['instructor_first_name']." ".$row['instructor_last_name'];
            	$_SESSION['mobile_number'] = $row['mobile_number'];
				$_SESSION['course_id'] ="";
            	header("Location: Instructor_info.php");
		        exit();
            }else{
				header("Location: Instructor_login_form.php?error=Incorect 1 User name or password");
		        exit();
			}
		}else{
			header("Location: Instructor_login_form.php?error=Incorect 2 User name or password");
	        exit();
		}
	}
	
}else{
	header("Location:Instructor_login_form.php");
	exit();
}