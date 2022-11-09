<?php 
session_start();
include "db_conn.php";
if (isset($_POST['i_id']) ){
?>
      

<!DOCTYPE html>
<html>
    <head>
        <title>Update Instructor Info</title>
        <style>
        </style>
        <link rel="stylesheet" type="text/css" href="style_retrieve.css">
        <link rel="stylesheet" type="text/css" href="style_update_instructor_info.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body >
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" >Update Instructor Info</a>
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

        <div class="container c2">
        <?php
        $i_id=$_POST['i_id'];?>
        <h1>Updating Info of Instructor ID <?php echo $i_id ?></h1>
        </div>
        <?php

        $first_name ="";
        $last_name ="";
        $mobile_number ="";
        $email ="";
        $department_id ="";

        $sql1 = "SELECT * FROM instructor WHERE instructor_id='$i_id'";
		$result1 = mysqli_query($conn, $sql1);

    

        if (mysqli_num_rows($result1) > 0) {
        ?>
            <div class="container c1 mb-1">
            <table> 
            <thead class="thead-dark" style="background-color:  rgb(115, 93, 186); color: white;">
            <td>instructor Id</td>
                <td>first_name</td>
                <td>last_name</td>
                <td>mobile_number</td>
                <td>email</td>
                <td>department_id</td>
    
            </tr>
            </thead>
            <?php
            $i=0;
            while($row = mysqli_fetch_array($result1)) {
            ?>
            <tr>
                <!-- I didn't use initial s_id => because i am getting eorror on next page of small and capital letters matching -->
                <td><?php $s_id=$row["instructor_id"];               echo $row["instructor_id"]; ?></td>
                <td><?php  $first_name=$row["instructor_first_name"];             echo $row["instructor_first_name"]; ?></td>
                <td><?php $last_name=$row["instructor_last_name"];              echo $row["instructor_last_name"]; ?></td>
                <td><?php $mobile_number=$row["mobile_number"];              echo $row["mobile_number"]; ?></td>
                <td><?php $email=$row["email"];              echo $row["email"]; ?></td>
                <td><?php $department_id=$row["department_id"];              echo $row["department_id"]; ?></td>
            </tr>
            <?php
            $i++;
            }
            ?>
            </table>
            </div>
            <div class="container c1 mb-1">
            <form action="update_instructor_info_background.php" method="post">
                <h2>Update Student Info</h2>
                <div class="row mb-0.5">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Instructor Id</label>
                    <div class="col-sm-3">
                        <input type="text" name="i_id" class="form-control form-control-sm" id="colFormLabelSm" value="<?php echo $i_id; ?>" placeholder="">
                    </div>
                </div>
                <div class="row mb-0.5">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">First Name</label>
                    <div class="col-sm-3">
                        <input type="text" name="first_name" class="form-control form-control-sm" id="colFormLabelSm" value="<?php echo $first_name; ?>" placeholder="">
                    </div>
                </div>
                <div class="row mb-0.5">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Last Name</label>
                    <div class="col-sm-3">
                        <input type="text" name="last_name" class="form-control form-control-sm" id="colFormLabelSm" value="<?php echo $last_name; ?>" placeholder="">
                    </div>
                </div>
                <div class="row mb-0.5">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Mobile number</label>
                    <div class="col-sm-3">
                        <input type="text" name="mobile_number" class="form-control form-control-sm" id="colFormLabelSm" value="<?php echo $mobile_number; ?>" placeholder="">
                    </div>
                </div>
                <div class="row mb-0.5">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
                    <div class="col-sm-3">
                        <input type="text" name="email" class="form-control form-control-sm" id="colFormLabelSm" value="<?php echo $email; ?>" placeholder="">
                    </div>
                </div>
                <div class="row mb-0.5">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Department Id </label>
                    <div class="col-sm-3">
                        <input type="text" name="department_id" class="form-control form-control-sm" id="colFormLabelSm" value="<?php echo $department_id; ?>" placeholder="">
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-outline-success ">Update</button>
            </form>
        </div>

        <?php
        }
        else{
            echo "Database is Empty";
        }
        


        $sql1 = "SELECT * FROM course WHERE instructor_id='$i_id' ";
		$result1 = mysqli_query($conn, $sql1);


        if (mysqli_num_rows($result1) > 0) {
        ?>
        
        <div class="container c1 mb-1">
        <table>
        <thead class="thead-dark" style="background-color: rgb(115, 93, 186); color: white;">
        <tr>
            <td>instructor_id</td>
            <td>Course_id</td>
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
        </div>

        <?php
        }
        else{
            echo "Database is Empty";
        }


        ?>

        <div class="container c1 mb-1">
        <form action="update_instructor_info_background.php" method="post">
           <h2>Add New Course</h2>
            <div class="row mb-0.5">
                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Instructor Id</label>
                <div class="col-sm-3">
                    <input type="text" name="i_id" class="form-control form-control-sm" id="colFormLabelSm" value="<?php echo $i_id; ?>" placeholder="">
                </div>
            </div>
            <div class="row mb-0.5">
                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Course Id</label>
                <div class="col-sm-3">
                    <input type="text" name="course_id" class="form-control form-control-sm" id="colFormLabelSm"  placeholder="Course Id" required>
                </div>
            </div>
           <button type="submit1" class="btn btn-outline-success ">Add New course</button>
        </form>
        </div><br>

    </body>
</html>

<?php
}else{
     header("Location:admin_info.php");
     exit();
}
?>