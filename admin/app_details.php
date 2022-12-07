<?php
require('phpmailer/PHPMailer.php');
require('phpmailer/SMTP.php');
require('phpmailer/Exception.php');
use  PHPMailer\PHPMailer\PHPMailer;
use  PHPMailer\PHPMailer\SMTP;
use  PHPMailer\PHPMailer\Exception;
?>
<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<?php

$appid =($_GET['appid']);

if(isset($_POST['update']))
{
	$status=$_POST['status'];
	$updated_at=date('Y-m-d H:i:s', time());

	$result = mysqli_query($conn,"update tblapp set status='$status', updated_at='$updated_at' where id='$appid'")or die(mysqli_error());
	if ($result) {
		$query = mysqli_query($conn,"select * from tblapp where id = '$appid' ")or die(mysqli_error());
		$row = mysqli_fetch_array($query);
		
		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->Port = 587;                                    // TCP port to connect to
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted

		$mail->Username = 'zfiglan63@gmail.com';                 // SMTP username
		$mail->Password = 'rajykjhnpdrriora';                           // SMTP password

		$mail->setFrom('zfiglan63@gmail.com','M.S.S Application');
		$mail->addAddress($row['email'], $row['name']); 			// Add a recipient
		$mail->addAddress($row['additional_email'], $row['name']); 			// Add a recipient		// Add a recipient
		$mail->addReplyTo('zfiglan63@gmail.com', 'Admin');

		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'Bisho High School System Responce';
		if($status==1){ //approved
			$mail->Body    = 'Good day '.$row['name'].',<br> We will like to infrom you that Application has been approved';
			$mail->AltBody = 'Good day student,<br> We will like to infrom you that Application has been approved';
		}elseif($status==2){  // rejected
			$mail->Body    = 'Good day '.$row['name'].',<br> We will like to infrom you that Application has been rejected';
			$mail->AltBody = 'Good day student,<br> We will like to infrom you that Application has been rejected';
		}else{ //pennding
			$mail->Body    = 'Good day '.$row['name'].',<br> We will like to infrom you that Application has been pennding';
			$mail->AltBody = 'Good day student,<br> We will like to infrom you that Application has been pennding';
		}

		$mail->addAttachment('../logo.png');         //Add attachments

		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {

		}
		$mail->smtpClose();

		echo "<script>alert('Application Status has been Successfully Updated');</script>";
		echo "<script type='text/javascript'> document.location = 'admin_dashboard.php'; </script>";
	} else{
	die(mysqli_error());
	}

}

?>

<body>
	
	<?php include('includes/navbar.php')?>
	<?php include('includes/left_sidebar.php')?>

	<div class="mobile-menu-overlay"></div>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="title">
							<h4>APPLICATION DETAILS</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin_dashboard">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Applications</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-30">
						<div class="card-box height-100-p overflow-hidden">
							<div class="profile-tab height-100-p">
								<div class="tab height-100-p">
									<ul class="nav nav-tabs customtab" role="tablist">
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#setting" role="tab">Application Details</a>
										</li>
									</ul>
									<div class="tab-content">
										<!-- application Tab start -->
										<?php
											$query = mysqli_query($conn,"select * from tblapp where id = '$appid' ")or die(mysqli_error());
											$row = mysqli_fetch_array($query);
										?>
									<div class="tab-pane active height-100-p" id="setting" role="tabpanel">
											<div class="profile-setting">
													<div class="profile-edit-list row">
														<div class="col-md-12"><h4 class="text-dark h5 mb-20">Update the application status</h4></div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Name</label>
															     <div class="input-group">
                                                                    <input type="text" name="full_name" class="form-control" readonly value="<?php echo $row['name']; ?>">
                                                                </div>
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Surname</label>
																<div class="input-group">
                                                                    <input type="text" name="student_number" class="form-control" readonly value="<?php echo $row['surname']; ?>">
                                                                </div>
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Initials</label>
																<div class="input-group">
                                                                    <input type="text" name="student_number" class="form-control" readonly value="<?php echo $row['initials']; ?>">
                                                                </div>
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Email Address</label>
																<div class="input-group">
                                                                    <input type="email" name="email" class="form-control" readonly value="<?php echo $row['email']; ?>">
                                                                </div>
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Additional Email Address</label>
																<div class="input-group">
                                                                    <input type="email" name="email" class="form-control" readonly value="<?php echo $row['additional_email']; ?>">
                                                                </div>
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Date of Birth </label>
																<div class="input-group">
                                                                    <input type="text" name="sport_code" class="form-control" readonly value="<?php echo $row['date_of_birth']; ?>">
                                                                </div>
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Home Address</label>
																<div class="input-group">
                                                                    <input type="text" name="course" class="form-control" readonly value="<?php echo $row['home_address']; ?>">
                                                                </div>
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Postal Suburb</label>
																<div class="input-group">
                                                                    <input type="text" name="address" class="form-control" readonly value="<?php echo $row['postal_suburb']; ?>">
                                                                </div>
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Postal City</label>
																<div class="input-group">
                                                                    <input type="text" name="id_number" class="form-control" readonly value="<?php echo $row['postal_city']; ?>">
                                                                </div>
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Phone Number</label>
																<div class="input-group">
                                                                    <input type="text" name="phone_number" class="form-control" readonly value="<?php echo $row['phone']; ?>">
                                                                </div>
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Gender</label>
																<div class="input-group">
                                                                    <input type="text" name="next_of_kin_name" class="form-control" readonly value="<?php echo $row['gender']; ?>">
                                                                </div>
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Population Group</label>
																<div class="input-group">
                                                                    <input type="text" name="next_of_kin_phone" class="form-control" readonly value="<?php echo $row['population']; ?>">
                                                                </div>
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Receive Email communication</label>
																<div class="input-group">
                                                                    <input type="text" name="medical_condition" class="form-control" readonly value="<?php echo $row['receive']; ?>">
                                                                </div>
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Application Submition Date</label>
																<div class="input-group">
                                                                    <input type="text" name="signed_date" class="form-control" readonly value="<?php echo $row['created_at']; ?>">
                                                                </div>
															</div>
														</div>
										
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label></label>
																<div class="modal-footer justify-content-center">
																	<button class="btn" style="background-color:#7F5F95; color: #fff;" name="new_update" data-toggle="modal" data-target="#exampleModal">Update</button>
																</div>
															</div>
														</div>
								
														
															<!-- Modal -->
															<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
															<div class="modal-dialog modal-dialog-centered" role="document">
																<div class="modal-content">
																	<form action="" method="POST">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLabel">Update Application Status</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
																<div class="form-group">
																	<label for="exampleSelect">Application Status</label>
																	<select class="form-control" id="exampleSelect" name="status" required>
																	<option  selected>select status</option>
																	<option value="1">Approve</option>
																	<option value="2">Reject</option>
																	<option value="0">Pending</option>
																	</select>
																</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																	<button type="submit" name="update" class="btn" style="background-color:#7F5F95; color: #fff;">Save changes</button>
																</div>
																</form>
																</div>
															</div>
															</div>
														</div>

													</div>
											</div>
										</div>
										<!-- Setting Tab End -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts.php')?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
		$( document ).ready(function() {
			var signiture = "<?php echo $row['signature']; ?>";
			// alert(signiture);
			$("#sig-image").attr("src", signiture);
			// sigImage.setAttribute("src", dataUrl);
		
		});
	</script>
</body>
</html>