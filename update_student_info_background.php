<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['submit']) ) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	$s_id=validate($_POST['s_id']);
	$first_name = validate($_POST['first_name']);
    $last_name = validate($_POST['last_name']);
    $mobile_number = validate($_POST['mobile_number']);
    $admission_year = validate($_POST['admission_year']);
	$email=$_POST['email'];
    $date_of_birth=$_POST['date_of_birth'];
    $semester=$_POST['semester'];
    $cgpa=$_POST['cgpa'];
    $department_id=$_POST['department_id'];

		$sql = "SELECT * FROM student_info WHERE roll_number='$s_id' ";
		echo "$s_id";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['roll_number'] === $s_id) {
				$sql1="UPDATE student_info SET first_name = '$first_name', last_name = '$last_name',mobile_number = '$mobile_number',admission_year = '$admission_year',
                 email = '$email',date_of_birth = '$date_of_birth',semester = '$semester',cgpa = '$cgpa',department_id = '$department_id'
				WHERE roll_number='$s_id'";
				$result1 = mysqli_query($conn, $sql1);

            	header("Location: admin_info.php?error=Successfully updated info for $s_id $first_name $last_name");
				// echo "case1";
		        exit();
            }else{
				header("Location: admin_info.php?error=Incorect User name or password");
				// echo "case2";
		        exit();
			}
		}else{
			header("Location: admin_info.php?error=Incorect User name or password");
			// echo "case3";
	        exit();
		}
	
	
}
if (isset($_POST['course_id']) ) {
    
	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	 }
	 $s_id=validate($_POST['s_id']);
	 $course_id = validate($_POST['course_id']);

	$sql1= "INSERT INTO mark (roll_number, course_id) VALUES ('$s_id','$course_id')";mysqli_query($conn, $sql1);
		header("Location: admin_info.php?error=Successfully Added course info for $s_id ");
		// echo "case1";
		exit();
		 
	 
	 
}
else{
	header("Location:admin_info.php");
	// echo "case4";
	exit();
}