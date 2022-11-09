<?php 
session_start();
include "db_conn.php";
if (isset($_SESSION['roll_number']) && isset($_SESSION['mobile_number'])) {

?>
      

<!DOCTYPE html>
<html>
    <head>
        <title>Student Login</title>
        <style>
        </style>
        <link rel="stylesheet" type="text/css" href="style_retrieve.css">
        <link rel="stylesheet" href="student.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body >
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">&emsp;
            <a class="navbar-brand" >Student Login</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="homepage.html">Home</a>
                </li>&emsp;
                <li class="nav-item">
                    <a class="nav-link active"  href="aboutus.html">About us</a>
                </li>&emsp;
                <li class="nav-item dropdown ">
                <button type="button" class="btn dropdown-toggle" style="background-color:#C9B6F2 ;" data-bs-toggle="dropdown">Login</button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="student_login_form.php">Student</a></li>
                  <li><a class="dropdown-item" href="Instructor_login_form.php">Instructor</a></li>
                  <li><a class="dropdown-item" href="admin_login_form.php">Admin</a></li>
                </ul>
                </li>&emsp;
                <li class="nav-item">
                    <a class="nav-link active" href="notice.html">Notice Board</a>
                </li>
                </ul>
            </div>
            </div>
        </nav>
        <h5 class="wel">  Welcome, <?php echo $_SESSION['roll_number']; ?></h5>
        <section id="ABC">
            <div class="back"><b>PROGRESS REPORT</b></div>
            <!-- <h1><center>Welcome, <?php echo $_SESSION['roll_number']; ?></center></h1> -->
        </section>
        <div class=info>
        <?php
        $roll_number=$_SESSION['roll_number'];
        $sql = "SELECT * FROM student_info WHERE roll_number='$roll_number' ";
		$result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $f_name=$row['first_name'];
        $m_name=$row['middle_name'];
        $l_name=$row['last_name'];
        $mobile=$row['mobile_number'];
        $year=$row['admission_year'];
        $email=$row['email'];
        $DOB=$row['date_of_birth'];
        $semester=$row['semester'];
        $cgpa=$row['cgpa'];
        $department_id=$row['department_id'];

        ?>

        <h5>NAME - <?php echo $f_name ; ?> <?php echo $l_name; ?></h5>
        <!-- <h1> <?php echo $l_name; ?></h1> -->
        <h5 class="mob">MOBILE- <?php echo $mobile; ?></h5>
        <h5>EMAIL - <?php echo $email; ?></h5>
        <h5 class="dob">DOB - <?php echo $DOB; ?></h5>
        <h5>YEAR - <?php echo $year; ?></h5>
        <h5 class="sem">SEMESTER - <?php echo $semester; ?></h5>
        <h5>CGPA - <?php echo $cgpa; ?></h5>
        <h5 class="dep">DEPARTMENT - <?php echo $department_id; ?></h5>
</div>

    <?php


        $sql1 = "SELECT * FROM mark WHERE roll_number='$roll_number' ";
		$result1 = mysqli_query($conn, $sql1);


        if (mysqli_num_rows($result1) > 0) {
        ?>
        <table>
            <thead class="thead-dark">
        <!-- <thead class="thead-dark" style="background-color: black; color: white;"> -->
        <tr>
            <td><b>Roll No.</td>
            <td><b>Course_id</td>
            <td><b>Midsem</td>
            <td><b>Endsem</td>
            <td><b>Total</td>
            <td><b>Grade</td>

        </tr>
        </thead>
        <?php
        $i=0;
        while($row = mysqli_fetch_array($result1)) {
        ?>
        <tr>
            <td><?php echo $row["roll_number"]; ?></td>
            <td><?php echo $row["course_id"]; ?></td>
            <td><?php echo $row["midsem_mark"]; ?></td>
            <td><?php echo $row["endsem_mark"]; ?></td>
            <td><?php echo $row["total_mark"]; ?></td>
            <td><?php echo $row["grade"]; ?></td>


        </tr>
        <?php
        $i++;
        }
        ?>
        </table>

        <?php
        }
        else{
            echo "Database is Empty";
        }







        ?>

        <br><a href="logout.php"><button class="add">Logout</button></a>

    </body>
</html>




<?php 
}else{
     header("Location:student_login_form.php");
     exit();
}
 ?>