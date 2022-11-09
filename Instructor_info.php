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
        <link rel="stylesheet" href="student.css" />
        <link rel="stylesheet" href="instructor.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body >
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">&emsp;
            <a class="navbar-brand" >Instructor Info</a>
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
        <h3 class="wel">WELCOME, <?php echo $_SESSION['instructor_name']; ?></h3>
</section>
    <div class=info>
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
        <h5>NAME - <?php echo $f_name ; ?> <?php echo $l_name; ?></h5>
        <!-- <h3> <?php echo $f_name; ?></h3>
        <h3> <?php echo $l_name; ?></h3> -->
        <h5 class="mob">MOBILE NUMBER -  <?php echo $mobile; ?></h3>
        <h5>EMAIL -  <?php echo $email; ?></h3>
        <h5 class="dep">DEPARTMENT -  <?php echo $department_id; ?></h3>
</div>        
        <?php

        $sql1 = "SELECT * FROM course WHERE instructor_id='$instructor_id' ";
		$result1 = mysqli_query($conn, $sql1);


        if (mysqli_num_rows($result1) > 0) {
        ?>
        <table>
        <thead class="thead-dark">
        <tr>
            <td><b>Instructor_id</td>
            <td ><b>Course_id</td>
        </tr>
        </thead>
        <?php
        $i=0;
        while($row = mysqli_fetch_array($result1)) {
        ?>
        <tr>
            <td><?php echo $row["instructor_id"]; ?></td>
            <td><?php echo $row["course_id"]; ?></td>
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
                <br>
                <br>
                <div class="ins">
            <h3 >Enter Course id to view the details</h3>
            </div>
            <br>
            <div class="lola">
            <label>COURSE ID</label>
            <input type="text" name="course_id" placeholder="course ID" ><br>
    </div>
            <button type="submit" class="add1">View</button>
    
        </form>
        <br><a href="logout.php"><button class="add">Logout</button></a>

    </body>
</html>




<?php 
}else{
     header("Location:Instructor_login_form.php");
     exit();
}
 ?>