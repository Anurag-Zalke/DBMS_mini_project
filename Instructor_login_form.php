<!doctype html>
<html lang="en">
  <head>
  	<title>Instructor Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login for Instructor</h2>
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
                    <div class="icon d-flex align-items-center justify-content-center" style="background-color: #B79BF2;">
		      		<span class="fa fa-user-o" style="background-color: #B79BF2;"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Sign In</h3>
						<form action="Instructor_login.php" method="post" class="login-form">
		      		<div class="form-group">
		      			<input type="text" name="e_id" class="form-control rounded-left" placeholder="Instructor ID" required>
		      		</div>
	            <div class="form-group d-flex">
	              <input type="text"   name="mobile" class="form-control rounded-left" placeholder="Mobile Number" required>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn rounded submit px-3" style="background-color: #B79BF2;">Login</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
	            		<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="homepage.html">Homepage</a>
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

