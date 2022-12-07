<!-- top navigation bar -->
<div class="header" style="background-color:#7F5F95; color: #fff;">
		<div class="header-left">
			<div class="menu-icon dw dw-menu">
			</div>	
			<h1>Bisho High School</h1>		
		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
				
				</div>
			</div>
			
			<div class="user-info-dropdown">
				<div class="dropdown">

					<?php $query= mysqli_query($conn,"select * from tblemployees where emp_id = '$session_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
						?>

					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
					<span class="user-icon">
							<img src="uploads/NO-IMAGE-AVAILABLE.jpg" alt="">
						</span>
						<span class="user-name"><?php echo $row['FirstName']. " " .$row['LastName']; ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

						<a class="dropdown-item" href="../logout.php"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>
			
		</div>
	</div>