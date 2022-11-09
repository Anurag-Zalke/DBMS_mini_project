<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['register']) ) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$i_id = validate($_POST['i_id']);
	$f_name = validate($_POST['f_name']);
    $l_name = validate($_POST['l_name']);
    $mobile = validate($_POST['mobile']);
    $email = validate($_POST['email']);
    $department_id = validate($_POST['department_id']);

	if (empty($i_id)) {
		header("Location: student_registration_form.php?error=Student ID  is required");
	    exit();
	}else if(empty($mobile)){
        header("Location: student_registration_form.php?error=mobile is required");
	    exit();
	}
	else{
        $sql="INSERT INTO instructor VALUES ('$i_id','$f_name','$l_name','$mobile','$email','$department_id')";
        mysqli_query($conn, $sql);

		$course1 = validate($_POST['course1']);
		$sql1="INSERT INTO course VALUES ('$course1','$i_id')";
		mysqli_query($conn, $sql1);

		// if (mysqli_num_rows($result)) {

            header("Location: instructor_registration_form.php?error=Successful Registration of Instructor Id $i_id $f_name $l_name");
			
            exit();
		// }else{
			// header("Location: student_registration_form.php?error=Incorect 2 Login Id or password");
	        // exit();
		// }
	}
	
}else{
	header("Location:instructor_registration_form.php?error=error while registration");
	exit();
}