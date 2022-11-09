<!DOCTYPE html>
<html>
    <head>
        <title>Student registration form</title>
        <style>
        </style>
        <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body >
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" >Student registration</a>
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
                <li class="nav-item">
                    <a class="nav-link active"  href="admin_info.php">Admin Info</a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Login
                    </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="student_login_form.php">Student</a></li>
                    <li><a class="dropdown-item" href="Instructor_login_form.php">Instructor</a></li>
                    <li><a class="dropdown-item" href="admin_login_form.php">Admin</a></li>
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


        <form action="student_registration.php" method="post">
            <h2>Student Registration</h2>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <label>Student ID</label>
            <input type="text" name="s_id" placeholder="Student ID" required><br>

            <label>First Name</label>
            <input type="text" name="f_name" placeholder="First Name" required><br>
            <label>middle Name</label>
            <input type="text" name="m_name" placeholder="middle Name" required><br>
            <label>last Name</label>
            <input type="text" name="l_name" placeholder="last Name" required><br>
            <label>mobile Number</label>
            <input type="text" name="mobile" placeholder="mobile" required><br>
            <label>Admission Year</label>
            <input type="text" name="year" placeholder="Admission Year" required><br>
            <label>Email</label>
            <input type="text" name="email" placeholder="email" required><br>
            <label>Date of Birth(YYYY/MM/DD) </label>
            <input type="date" name="dob" placeholder="date of birth" required><br>
            <label>Semester</label>
            <input type="text" name="semester" placeholder="semester" required><br>
            <label>CGPA</label>
            <input type="text" name="cgpa" placeholder="cgpa" required><br>
            <label>Department Id</label>
            <input type="text" name="department_id" placeholder="department_id"required ><br>



            <h3>Select 5 courses compulsory </h3>
            <h4>if you want add extra courses add by student update link</h4>
            <label>Course 1</label>
            <input type="text" name="course1" placeholder="Course 1" required><br>
            <label>Course 2</label>
            <input type="text" name="course2" placeholder="Course 2" required><br>
            <label>Course 3</label>
            <input type="text" name="course3" placeholder="Course 3" required><br>
            <label>Course 4</label>
            <input type="text" name="course4" placeholder="Course 4" required><br>
            <label>Course 5</label>
            <input type="text" name="course5" placeholder="Course 5" required><br>


            <button type="register" name="register">Register</button>
        </form>
        
    </body>
</html>