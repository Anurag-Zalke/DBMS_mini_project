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

	$c_id = validate($_POST['c_id']);
	$c_name = validate($_POST['c_name']);
    $semester = validate($_POST['semester']);


	if (empty($c_id)) {
		header("Location: admin_info.php?error=course ID  is required");
	    exit();
	}else if(empty($c_name)){
        header("Location: admin_info.php?error=course Name is required");
	    exit();
	}
	else if(empty($semester)) {
		header("Location: admin_info.php?error=semster  is required");
	    exit();
	}
	else{
		$sql = "INSERT INTO course_details VALUES ('$c_id', '$c_name', '$semester')";

		$result = mysqli_query($conn, $sql);

		
		// $result1=mysqli_query($conn,$sql1) or die(mysqli_error()); 

		// if (mysqli_num_rows($result)) {

        header("Location: admin_info.php?error=Successful Added New course '$c_name' in syllabus");
			
            exit();
		// }else{
			// header("Location: admin_info.php?error=Incorect 2 Login Id or password");
	        // exit();
		// }
	}
	
}else{
	header("Location:admin_info.php?error=error while registration");
	exit();
}