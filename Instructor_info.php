<?php 
session_start();
include "db_conn.php";
if (isset($_SESSION['instructor_id']) && isset($_SESSION['mobile_number'])) {

?>
      

<!DOCTYPE html>
<html>
    <head>
        <title>Instructor Login</title>
        <style>
        </style>
        <link rel="stylesheet" type="text/css" href="style_retrieve.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body >
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" >Instructor Login</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="homepage.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active"  href="#">About us</a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Login
                    </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="student_login_form.php">Student</a></li>
                    <li><a class="dropdown-item" href="Instructor_login_form.php">Instructor</a></li>
                    <li><a class="dropdown-item" href="#">Admin</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Notice Board</a>
                </li>
                </ul>
                <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            </div>
        </nav>


        <h1>Hello, <?php echo $_SESSION['instructor_name']; ?></h1>
        

        <?php

        $instructor_id=$_SESSION['instructor_id'];
        $sql = "SELECT * FROM instructor WHERE instructor_id='$instructor_id' ";
		$result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $f_name=$row['instructor_first_name'];
        $l_name=$row['instructor_last_name'];
        $mobile=$row['mobile_number'];
        $email=$row['email'];
        $department_id=$row['department_id'];
        ?>

        <h3> <?php echo $f_name; ?></h3>
        <h3> <?php echo $l_name; ?></h3>
        <h3> <?php echo $mobile; ?></h3>
        <h3> <?php echo $email; ?></h3>
        <h3> <?php echo $department_id; ?></h3>

        
        <?php

        $sql1 = "SELECT * FROM course WHERE instructor_id='$instructor_id' ";
		$result1 = mysqli_query($conn, $sql1);


        if (mysqli_num_rows($result1) > 0) {
        ?>
        <table>
        <thead class="thead-dark" style="background-color: black; color: white;">
        <tr>
            <td>instructor_id</td>
            <td>Course_id</td>
            <td>Course_name</td>

        </tr>
        </thead>
        <?php
        $i=0;
        while($row = mysqli_fetch_array($result1)) {
        ?>
        <tr>
            <td><?php echo $row["instructor_id"]; ?></td>
            <td><?php echo $row["course_id"]; ?></td>
            <td><?php echo $row["course_name"]; ?></td>
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
        <form action="Instructor_mark_view.php" method="post">
            <h2>Enter course id to view</h2>
            <label>Course ID</label>
            <input type="text" name="course_id" placeholder="course ID" ><br>

            <button type="submit">View</button>
        </form>
        <br><a href="logout.php">Logout</a>

    </body>
</html>




<?php 
}else{
     header("Location:Instructor_login_form.php");
     exit();
}
 ?>