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
                    <li><a class="dropdown-item" href="Instructor_login_form.php">Instrustor</a></li>
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
        <h1>selected course, <?php echo $_POST['course_id']; ?></h1>
        <div class="sticky" style="padding: 10px;font-size: 10px;background-color:  rgb(103, 155, 145);">
            <form action="instructor_mark_editor.php" method="post">
                <label style="font-size:18px;" >Enter Student ID to edit marks</label>&emsp;
                <input type="text" name="s_id" placeholder="Student ID" style="font-size:12px;">&emsp;

                <button type="submit" style="font-size:11px;">Edit</button>
            </form>
        </div>


        <?php

        // $instructor_id=$_POST['instructor_id'];
        $course_id=$_POST['course_id'];
        $_SESSION['course_id']=$course_id;
        $sql1 = "SELECT * FROM mark WHERE course_id='$course_id' order by roll_number  ";
		$result1 = mysqli_query($conn, $sql1);

        
        if (mysqli_num_rows($result1) > 0) {
        ?>
        <table> 
        <thead class="thead-dark" style="background-color: black; color: white;">
        <td>Roll No.</td>
            <td>Course_id</td>
            <td>Midsem</td>
            <td>Endsem</td>
            <td>Total</td>
            <td>Grade</td>

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

        

        <br><a href="logout.php">Logout</a>

    </body>
</html>




<?php 
}else{
     header("Location:Instructor_info.php");
     exit();
}
 ?>