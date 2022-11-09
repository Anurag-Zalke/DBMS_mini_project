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

	$s_id = validate($_POST['s_id']);
	$f_name = validate($_POST['f_name']);
    $m_name = validate($_POST['m_name']);
    $l_name = validate($_POST['l_name']);
    $mobile = validate($_POST['mobile']);
    $year = validate($_POST['year']);
    $email = validate($_POST['email']);
    $dob = validate($_POST['dob']);
    $semester = validate($_POST['semester']);
    $cgpa = validate($_POST['cgpa']);
    $department_id = validate($_POST['department_id']);
	$course1 = validate($_POST['course1']);
	$course2 = validate($_POST['course2']);
	$course3 = validate($_POST['course3']);
	$course4 = validate($_POST['course4']);
	$course5 = validate($_POST['course5']);

	if (empty($s_id)) {
		header("Location: student_registration_form.php?error=Student ID  is required");
	    exit();
	}else if(empty($mobile)){
        header("Location: student_registration_form.php?error=mobile is required");
	    exit();
	}
	if (empty($course1)) {
		header("Location: student_registration_form.php?error=course 1  is required");
	    exit();
	}
	else{
		echo($s_id, $f_name, $m_name, $l_name, $mobile, $year, $email, $dob, $semester, $cgpa, $department_id);
		$sql = "INSERT INTO student_info VALUES ('$s_id', '$f_name', '$m_name', '$l_name', '$mobile', '$year', '$email', '$dob', '$semester', '$cgpa', '$department_id')";

		$result = mysqli_query($conn, $sql);

		$sql1= "INSERT INTO mark (roll_number, course_id) VALUES ('$s_id','$course1')";mysqli_query($conn, $sql1);
		$sql2= "INSERT INTO mark (roll_number, course_id) VALUES ('$s_id','$course2')";mysqli_query($conn, $sql2);
		$sql3= "INSERT INTO mark (roll_number, course_id) VALUES ('$s_id','$course3')";mysqli_query($conn, $sql3);
		$sql4= "INSERT INTO mark (roll_number, course_id) VALUES ('$s_id','$course4')";mysqli_query($conn, $sql4);
		$sql5= "INSERT INTO mark (roll_number, course_id) VALUES ('$s_id','$course5')";mysqli_query($conn, $sql5);

		
		// $result1=mysqli_query($conn,$sql1) or die(mysqli_error()); 

		// if (mysqli_num_rows($result)) {

            header("Location: student_registration_form.php?error=Successful Registration of Student Id $s_id $f_name $l_name");
			
            exit();
		// }else{
			// header("Location: student_registration_form.php?error=Incorect 2 Login Id or password");
	        // exit();
		// }
	}
	
}else{
	header("Location:student_registration_form.php?error=error while registration");
	exit();
}