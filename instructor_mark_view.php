<?php 
session_start();
include "db_conn.php";
if (isset($_POST['course_id'])) {
?>
      

<!DOCTYPE html>
<html>
    <head>
        
        <title>Instructor Mark View</title>
        <style>
            div.sticky {
                position: -webkit-sticky;
                position: sticky;
                top: 0;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="style_retrieve.css">
        <link rel="stylesheet" href="student.css" />
        <link rel="stylesheet" href="instructor.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body >


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" >Instructor Mark View</a>
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

        <section id="ABD">
        <h3 class="wel">HELLO, <?php echo $_SESSION['instructor_name']; ?></h1>
        </section>
        <br>
        <h3 class="pul">Selected course, <?php echo $_POST['course_id']; ?></h3>
        <br>
        <div class="sticky" style="padding: 10px;font-size: 10px;background-color:#C9B6F2;margin-left:37px;border:1px solid black; width:95%;">
            <form action="instructor_mark_editor.php" method="post">
                <label style="font-size:18px;" >Enter Student ID to edit marks</label>&emsp;
                <input type="text" name="s_id" placeholder="Student ID" style="font-size:15px;">&emsp;
                <button type="submit" class="kel"style="font-size:14px;background-color:white;border-radius: 16px;color:black";>Edit</button>
            </form>
        </div>


        <?php

        // $instructor_id=$_POST['instructor_id'];
        $course_id=$_POST['course_id'];
        $_SESSION['course_id']=$course_id;
        $sql1 = "SELECT * FROM mark WHERE course_id='$course_id' order by roll_number  ";
		$result1 = mysqli_query($conn, $sql1);

        
        if (mysqli_num_rows($result1) > 0){
        ?>
        <br>
        <br>
        <table> 
        <thead class="thead-dark">
        <td>Roll No.</td>
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
     header("Location:Instructor_info.php");
     exit();
}
 ?>