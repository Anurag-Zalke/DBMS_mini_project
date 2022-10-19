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
	$midsem = validate($_POST['midsem']);
    $endsem = validate($_POST['endsem']);
    $total = validate($_POST['total']);
    $grade = validate($_POST['grade']);
	$course_id=$_SESSION['course_id'];

		$sql = "SELECT * FROM mark WHERE roll_number='$s_id' AND course_id='$course_id'";
		echo "$s_id";
		echo "$course_id";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['roll_number'] === $s_id && $row['course_id'] === $course_id) {
				$sql1="UPDATE mark SET midsem_mark = '$midsem', endsem_mark = '$endsem',total_mark = '$total',grade = '$grade' 
				WHERE roll_number='$s_id' AND course_id='$course_id'";
				$result1 = mysqli_query($conn, $sql1);

            	header("Location: instructor_mark_editor.php");
				// echo "case1";
		        exit();
            }else{
				header("Location: instructor_mark_editor.php?error=Incorect User name or password");
				// echo "case2";
		        exit();
			}
		}else{
			header("Location: instructor_mark_editor.php?error=Incorect User name or password");
			// echo "case3";
	        exit();
		}
	
	
}else{
	header("Location:instructor_mark_editor.php");
	// echo "case4";
	exit();
}