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
	$i_id=validate($_POST['i_id']);
	$first_name = validate($_POST['first_name']);
    $last_name = validate($_POST['last_name']);
    $mobile_number = validate($_POST['mobile_number']);
	$email=$_POST['email'];
    $department_id=$_POST['department_id'];

		$sql = "SELECT * FROM instructor WHERE instructor_id='$i_id' ";
		echo "$i_id";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['instructor_id'] === $i_id) {
				$sql1="UPDATE instructor SET instructor_first_name = '$first_name', instructor_last_name = '$last_name',mobile_number = '$mobile_number',
                 email = '$email',department_id = '$department_id'
				WHERE instructor_id='$i_id'";
				$result1 = mysqli_query($conn, $sql1);

            	header("Location: admin_info.php?error=Successfully updated info for $i_id $first_name $last_name");
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
	 $i_id=validate($_POST['i_id']);
	 $course_id = validate($_POST['course_id']);
 
		 
    $sql1= "INSERT INTO course (instructor_id, course_id) VALUES ('$i_id','$course_id')";mysqli_query($conn, $sql1);
    header("Location: admin_info.php?error=Successfully Added course info for $i_id ");
    // echo "case1";
    exit();
		 
	 
	 
}
else{
	header("Location:admin_info.php");
	// echo "case4";
	exit();
}