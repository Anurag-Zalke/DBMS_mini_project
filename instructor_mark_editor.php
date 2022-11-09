<?php 
session_start();
include "db_conn.php";
if (isset($_POST['s_id']) ){

?>
      

<!DOCTYPE html>
<html>
    <head>
        
        <title>Instructor Mark View</title>
        <style>
        </style>
        <link rel="stylesheet" type="text/css" href="style_retrieve.css">
        <link rel="stylesheet" type="text/css" href="inmark.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body >


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" >Instructor Mark Editor</a>
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
        &emsp;
        <div class="content">
        <h1><?php echo $_SESSION['instructor_name']; ?></h1>
</div>
&emsp;
<div class="select">
        <h4>Selected course  <?php echo $_SESSION['course_id']; ?></h4>
        <h4>Change marks of Student Id <?php echo $_POST['s_id']; ?></h4>
        </div>
        &emsp;
        <?php

        // $instructor_id=$_POST['instructor_id'];
        $s_id=$_POST['s_id'];
        $course_id=$_SESSION['course_id'];
        $midsem="0";
        $endsem="0";
        $total="0";
        $grade="0";





        $sql1 = "SELECT * FROM mark WHERE roll_number='$s_id' AND course_id='$course_id'";
		$result1 = mysqli_query($conn, $sql1);


        if (mysqli_num_rows($result1) > 0) {
        ?>
        <div class="entry">
        <table> 
        <thead class="thead-dark" style="background-color: #c9b6f2; margin-left:37px;color: black; border-color:black; ">
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
            <!-- I didn't use initial s_id => because i am getting eorror on next page of small and capital letters matching -->
            <td><?php $s_id=$row["roll_number"];               echo $row["roll_number"]; ?></td>         
            <td><?php  echo $row["course_id"]; ?></td>
            <td><?php  $midsem=$row["midsem_mark"];             echo $row["midsem_mark"]; ?></td>
            <td><?php $endsem=$row["endsem_mark"];              echo $row["endsem_mark"]; ?></td>
            <td><?php $total=$row["total_mark"];              echo $row["total_mark"]; ?></td>
            <td><?php $grade=$row["grade"];              echo $row["grade"]; ?></td>
        </tr>
        <?php
        $i++;
        }
        ?>
        </table>
        </div>
        &emsp;
        <div class="sticky" style="padding: 10px;font-size: 10px;background-color:#c9b6f2  ;">
            <form action="mark_editor.php" method="post">
                <h2>Enter Student Marks</h2><br>
                <div class="studid">
                <label style="font-size:20px;" >Student_Id</label>&emsp;&emsp;&emsp;
                <input type="text" name="s_id" placeholder="mark" style="font-size:12px;" value="<?php echo $s_id; ?>"><br>
                </div>
                <div class="midmark">
                <label style="font-size:18px;" >Midsem Marks</label>&emsp;
                <input type="text" name="midsem" placeholder="mark" style="font-size:12px;" value="<?php echo $midsem; ?>"><br>
                </div>
                <div class="endmark">
                <label style="font-size:18px;" >Endsem Marks</label>&emsp;
                <input type="text" name="endsem" placeholder="mark" style="font-size:12px;" value="<?php echo $endsem; ?>"><br>
                </div> 
                <div class="totalmark">
                <label style="font-size:18px;" >Total Marks</label>&emsp;&emsp;&emsp;&emsp;
                <input type="text" name="total" placeholder="mark" style="font-size:12px;" value="<?php echo $total; ?>"><br>
                 </div>
                 <div class="grade">
                <label style="font-size:18px;" >Final Grade</label>&emsp;&emsp;&emsp;
                <input type="text" name="grade" placeholder="grade" style="font-size:12px;" value="<?php echo $grade; ?>"><br>
                </div>
                
                <button type="submit" class="button" name="submit" style="font-size:15px;">Edit</button>
                
            </form>
        </div>

        <?php
        }
        else{
            echo "Database is Empty";
        }


        ?>

        
        
        <br><a href="logout.php">
            <button class="log">Logout</button>
        </a>
    
    </body>
</html>




<?php 
}else{
     header("Location:instructor_mark_view.php");
     exit();
}
 ?>