<!doctype html>
<html lang="en">
  <head>
  	<title>Student Registration Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-2">
					<h2 class="heading-section">Student Registration</h2>
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-9">
				<div class="login-wrap p-4 p-md-5">
				<form action="student_registration.php" method="post" class="login-form">
                    <div class="row mb-1">
                        <div class="col">
                            <input type="text" name="s_id" class="form-control" placeholder="Student ID" >
                        </div>
                        <div class="col">
                            <input type="text" name="f_name" class="form-control" placeholder="First name">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <input type="text" name="m_name" class="form-control" placeholder="Middle name" >
                        </div>
                        <div class="col">
                            <input type="text" name="l_name" class="form-control" placeholder="Last name">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <input type="text" name="dob" class="form-control" placeholder="Date of Birth" >
                        </div>
                        
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <input type="text" name="email" class="form-control" placeholder="Email" >
                        </div>
                        <div class="col">
                            <input type="text" name="mobile" class="form-control" placeholder="mobile Number">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <input type="text" name="semester" class="form-control" placeholder="Semester" >
                        </div>
                        <div class="col">
                            <input type="text" name="cgpa" class="form-control" placeholder="CGPA">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <input type="text" name="department_id" class="form-control" placeholder="Department ID" >
                        </div>
                        <div class="col">
                            <input type="text" name="year" class="form-control" placeholder="Admission Year">
                        </div>
                    </div>

                    <h4>Select 5 courses compulsory </h4>
                    <h4>If you want add extra courses add by student update link</h4>

                    <div class="row mb-1">
                        <div class="col">
                            <input type="text" name="course1" class="form-control" placeholder="Course ID 1" >
                        </div>
                        <div class="col">
                            <input type="text" name="course2" class="form-control" placeholder="Course ID 2">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <input type="text" name="course3" class="form-control" placeholder="Course ID 3" >
                        </div>
                        <div class="col">
                            <input type="text" name="course4" class="form-control" placeholder="Course ID 4">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <input type="text" name="course5" class="form-control" placeholder="Course ID 5" >
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <button type="register" name="register"class="form-control btn rounded submit px-3" style="background-color: #B79BF2;">Register</button>
                            </div>
                        </div>
                    </div>
                    
		      		
                    
                   
	                <div class="form-group d-md-flex">
                        <div class="w-50">	
                        </div>
                        <div class="w-50 text-md-right">
                            <a href="admin_info.php">Admin Page</a>
                        </div>
                    </div>
	            </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

