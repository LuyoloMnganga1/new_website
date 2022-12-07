<?php
//adding the application details on database
include('includes/config.php');
if(isset($_POST['submit_app']))
{ 
    $name=$_POST['name'];
    $surname=$_POST['surname'];
	$initials =$_POST['initials'];
    $date_of_birth =$_POST['date_of_birth'];
    $home_address=$_POST['home_address'];
    $postal_suburb=$_POST['postal_suburb'];
    $postal_city=$_POST['postal_city'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $additional_email=$_POST['additional_email'];
    $gender=$_POST['gender'];
    $population=$_POST['population'];
    $receive=$_POST['receive'];
    $created_at=date('Y-m-d H:i:s', time());
    $updated_at=date('Y-m-d H:i:s', time());
        
    mysqli_query($conn,"INSERT INTO `tblapp`(`name`, `surname`, `initials`, `date_of_birth`, `home_address`, `postal_suburb`, `postal_city`, `phone`, `email`,
	 `additional_email`, `gender`, `population`, `receive`, `created_at`, `updated_at`) VALUES ('$name','$surname','$initials','$date_of_birth','$home_address','$postal_suburb',
	 '$postal_city','$phone','$email','$additional_email','$gender','$population','$receive','$created_at','$updated_at')")
	  or die(mysqli_error());
       echo "<script>alert('Application has been Successfully submitted');</script>";
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Bisho High School</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
</head>
<style>
	.nav-link{
		color: #fff !important;
	}
    .active{
		font-weight: bolder !important;
		color: black !important;
	}
</style>
<body>

	<nav class="navbar navbar-expand-sm  justify-content-center sticky-top" style="background-color:#7F5F95; color: #fff;">
		<div class="container-fluid">
			<a class="navbar-brand"  
target="_blank" href="login.php">
			  <img src="logo.png" alt="Avatar Logo" style="width:90px;right: 0px;" class="rounded-pill"> 
			</a>
			<h1>Bisho High School</h1>
			<ul class="navbar-nav">
				<li class="nav-item"><a  class="nav-link" href="index.html">Home</a></li>
	
				<li class="nav-item"><a  class="nav-link" href="activities.html">Activites</a></li>
				 
				 <li class="nav-item"><a class="nav-link" href="Academics.html">Academics</a></li>
			 
				 <li class="nav-item"><a class="nav-link active" href="apply.html">Application</a></li>
			 
				 <li class="nav-item"><a class="nav-link " href="about.html">About us</a></li>
			 
				 <li class="nav-item"><a  class="nav-link" href="contact.php">Contact Us</a></li>
			 
				
			</ul>
		  </div>
	  </nav> 

<div class="container-fluid">
	<div class="card mt-5"  style="width: 80%; margin-left:10%">
		<div class="card-header" style="background-color:#7F5F95; color: #fff;">
				<h1>Application Form</h1>
		</div>
		<form  method="post">
		<div class="card-body">
			<div class="row">

				<div class="col-lg-6">
					<div class="form-group">
						<label for="">First Name</label>
						<input type="text" name="name" id="" class="form-control" placeholder="Enter your name" required>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="form-group">
						<label for="">Last Name</label>
						<input type="text" name="surname" id="" class="form-control" placeholder="Enter your surname" required>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="form-group">
						<label for="">Initials</label>
						<input type="text" name="initials" id="" class="form-control" placeholder="Enter your initials" required>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="form-group">
						<label for="">Date of Birth</label>
						<input type="date" name="date_of_birth" id="" class="form-control"  required>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="form-group">
						<label for="">Home Address</label>
						<input type="text" name="home_address" id="" class="form-control" placeholder="Enter your address" required>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="form-group">
						<label for="">Postal Suburb</label>
						<input type="text" name="postal_suburb" id="" class="form-control" placeholder="Enter your suburb" required>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="form-group">
						<label for="">Postal City</label>
						<input type="text" name="postal_city" id="" class="form-control" placeholder="Enter your city" required>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="form-group">
						<label for="">Phone Number</label>
						<input type="number" name="phone" id="" class="form-control" required>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="form-group">
						<label for="">E-mail Address</label>
						<input type="email" name="email" id="" class="form-control" placeholder="Enter your email" required>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="form-group">
						<label for="">Additional E-mail Address</label>
						<input type="email" name="additional_email" id="" class="form-control" placeholder="Enter your additional email" required>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="form-group">
						<label for="">Gender</label>
						<select name="gender" id="" class="form-control" required>
							<option value="" disables selected>Select gender</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="form-group">
						<label for="">Population Group</label>
						<select name="population" id="" class="form-control" required>
							<option value="" disables selected>Select population group</option>
							<option value="Black African">Black African</option>
							<option value="Indian">Indian</option>
							<option value="white">White</option>
							<option value="Other">Other</option>
						</select>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="form-group">
						<label for="">Receive Email communication</label>
						<select name="receive" id="" class="form-control" required>
							<option value="" disables selected>Select Communication</option>
							<option value="Yes">Yes</option>
							<option value="No">No</option>
						</select>
					</div>
				</div>
			
			</div>
			
		</div>
		<div class="card-footer">
			<div class="col-md-12">
				<div class="row">
					<button class="btn" type="submit" name="submit_app" style="background-color:#7F5F95; color: #fff;">Submit</button>
				</div>
			</div>
		</div>
	</form>
	</div>
</div>


 <!-- Footer Start -->
 <div class="container-fluid  text-white mt-5 py-5 px-sm-3 px-md-5" style="background-color:#7F5F95; color: #fff;">
	<div class="row pt-5">
		<div class="col-lg-4 col-md-12 mb-5">
		<img src="logo.png" style="width:40%;height:50%;" alt="logo" >
		<br></br>
			<p class="m-0">Bisho High School Was established in January 2006.The school is situated outside King William’s Town.</p>
		</div>
		<div class="col-lg-8 col-md-12">
			<div class="row">
				<div class="col-md-6 mb-5 vl">
					<h5 class="text-dark mb-4">Quick Links</h5>
					<div class="d-flex flex-column justify-content-start">
						<div class ="row ">
						<div class="col-md-6 mb-5 ">
						<a class="text-white mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a> <br>
						<a class="text-white mb-2" href="activities.html"><i class="fa fa-angle-right mr-2"></i>Activites</a><br>
						<a class="text-white mb-2" href="Academics.html"><i class="fa fa-angle-right mr-2"></i>Academics</a><br>
						<a class="text-white mb-2" href="apply.html"><i class="fa fa-angle-right mr-2"></i>Application</a><br>
						</div>
						<div class="col-md-6 mb-5 ">
						<a class="text-white mb-2" href="about.html"><i class="fa fa-angle-right mr-2"></i>About Us</a><br>
						<a class="text-white mb-2" href="contact.php"><i class="fa fa-angle-right mr-2"></i>Contact Us</a><br>
						<a class="text-white" href="Reports.html"><i class="fa fa-angle-right mr-2"></i>Reports</a><br>
						</div>
						</div>
					</div>
				</div>

				<div class="col-md-6 mb-5 vl">
					<h5 class="text-dark mb-4">Get In Touch</h5>
					<p><i class="fa fa-map-marker-alt mr-2"></i> No 6 Curlewis Road King William's Town	5611 Eastern Cape</p>
					<p><i class="fa fa-phone-alt mr-2"></i>(082)2432 123</p>
					<p><i class="fa fa-envelope mr-2"></i>BishoHigh@ecgschools.gov.za</p>
					<div class="d-flex justify-content-start mt-4 text-light">
						<a class="btn btn-outline-light rounded-circle text-center mr-2 px-0 text-dark" style="width: 40px; height: 40px;" href="www.twitter.com/"><i class="fab fa-twitter"></i></a>
						<a class="btn btn-outline-light rounded-circle text-center mr-2 px-0 text-dark" style="width: 40px; height: 40px;" href="www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
						<a class="btn btn-outline-light rounded-circle text-center mr-2 px-0 text-dark" style="width: 40px; height: 40px;" href="www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row pt-3">
		<div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
			<p class="m-0 text-white">
			&copy; <a class="text-white font-weight-bold" href="#">Bisho High school</a>. All Rights Reserved. Designed by
			Powered by Bisho High school
			</p>
		</div>
		</div>
	</div>
</div>
<!-- Footer End -->
</body>
</html>