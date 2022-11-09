<?php 
session_start();
include "db_conn.php";
if (isset($_SESSION['admin_id']) ) {

?>
      

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
        <style>
        </style>
        <link rel="stylesheet" type="text/css" href="style_retrieve.css">
        <link rel="stylesheet" type="text/css" href="style_admin_info.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body >
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" >Admin Info</a>
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
        <br>
        <div class="container c1 mb-1">
        <h3>Hello, <?php echo $_SESSION['admin_name']; ?></h3>
        </div>
        
        <div class="container c3 mb-1">
        <?php if (isset($_GET['error'])) { ?>
            <h2 class="error"><?php echo $_GET['error']; ?></h2>
        <?php } ?>
       
        
        </div>

        <div class="container c2 mb-1">
        <h2>Select following operation </h2>
        <a class="btn btn-outline-success" href="student_registration_form.php" role="button">Register New Student</a><br><br>
        <a class="btn btn-outline-success" href="instructor_registration_form.php" role="button">Register New Instructor</a><br><br>


        <form class="row row-cols-lg-auto g-3 align-items-center" action="update_student_info.php" method="post">
            <div class="col-12">
                <label class="visually-hidden" for="inlineFormInputGroupUsername">student_Username</label>
                <div class="input-group">
                <input type="text" name="s_id" class="form-control" id="inlineFormInputGroupUsername" placeholder="Student ID" required>
                </div>
            </div>
            <div class="col-12">
                <button type="submit1" class="btn btn-outline-success">Update student info</button>
            </div>
        </form><br>

        <form class="row row-cols-lg-auto g-3 align-items-center" action="update_instructor_info.php" method="post">
            <div class="col-12">
                <label class="visually-hidden" for="inlineFormInputGroupUsername">instructor_Username</label>
                <div class="input-group">
                <input type="text" name="i_id" class="form-control" id="inlineFormInputGroupUsername" placeholder="Instructor ID" required>
                </div>
            </div>
            <div class="col-12">
                <button type="submit2" class="btn btn-outline-success">Update Instructor info</button>
            </div>
        </form>
        <br>

        <form action="Add_course.php" method="post">
            <h2>Add New Course in syllabus</h2>
            <div class="col-sm-4 mb-1">
                <input type="text" name="c_id" class="form-control" placeholder="Course ID"  required>
            </div>
            <div class="col-sm-4 mb-1">
                <input type="text" name="c_name" class="form-control" placeholder="Course Name"  required>
            </div>
            <div class="col-sm-4 mb-1">
                <input type="text" name="semester" class="form-control" placeholder="semester"  required>
            </div>

            <button type="submit"  name="submit" class="btn btn-outline-success">Submit</button>
        </form>
        <div>
        <br><a class="btn btn-outline-danger" href="logout.php" role="button">Logout</a><br>

    </body>
</html>




<?php 
}else{
     header("Location:Instructor_login_form.php");
     exit();
}
 ?>