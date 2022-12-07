<?php
include('includes/config.php');
if(isset($_POST['send_message']))
{ 
    $sender_name=$_POST['sender_name'];
    $sender_email=$_POST['sender_email'];
    $message =$_POST['message'];
    $created_at=date('Y-m-d H:i:s', time());

    mysqli_query($conn,"INSERT INTO `tblcontact`(`name`, `email`, `message`, `created_at`) VALUES ('$sender_name','$sender_email','$message','$created_at')")
	 or die(mysqli_error());
    echo "<script>alert('Message has been Successfully submitted');</script>";
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
			 
				 <li class="nav-item"><a class="nav-link" href="apply.html">Application</a></li>
			 
				 <li class="nav-item"><a class="nav-link" href="about.html">About us</a></li>
			 
				 <li class="nav-item"><a  class="nav-link active" href="contact.php">Contact Us</a></li>
			 
				
			</ul>
		  </div>
	  </nav> 

	  <div class="container-fluid mt-5">
		<div class="card" style="width: 50%; margin-left:25%">
			<div class="card-header" style="background-color:#7F5F95; color: #fff;">
				<h1>Contact Us</h1>
			</div>
			<div class="card-body">
				<form method="post" name="submit">
					<div class="row">
									<div class="control-group">
										<input type="text" class="form-control" id="sender_name" name="sender_name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your full name" />
                                            <p class="help-block text-danger"></p>
                                        </div>
                                        <div class="control-group">
                                            <input type="email" class="form-control" id="email" name="sender_email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
                                            <p class="help-block text-danger"></p>
                                        </div>
                                        <div class="control-group">
                                            <textarea class="form-control" rows="6" id="message" name="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
                                            <p class="help-block text-danger"></p>
                                        </div>
                                        <div>
                                            <button class="btn" style="background-color:#7F5F95; color: #fff;" type="submit" name="send_message">Send Message</button>
                                        </div>
					</div>
				</form>
			</div>
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
