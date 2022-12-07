<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<?php 
	 if (isset($_GET['delete'])) {
		$appid = $_GET['delete'];
		$sql = "DELETE FROM tblcontact where id = ".$appid;
		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo "<script>alert('Message deleted Successfully');</script>";
     		echo "<script type='text/javascript'> document.location = 'messages.php'; </script>";
		}
	}
?>
<body>
	
	<?php include('includes/navbar.php')?> 
	<?php include('includes/left_sidebar.php')?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="page-header">
				<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Messages</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">All messages</li>
								</ol>
							</nav>
						</div>
				</div>
			</div>

			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-dark h4">ALL MESSAGES</h2>
					</div>
				<div class="pb-20">
				<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
							<th class="table-plus datatable-nosort">#</th>
								<th> NAME</th>
								<th>EMAIL ADDRESS</th>
								<th>MeSSAGE</th>
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>

								<?php 
								$status=1;
								$sql = "SELECT * from tblcontact order by id desc limit 5";
									$query = mysqli_query($conn, $sql) or die(mysqli_error());
									$cnt=1;
									while ($row = mysqli_fetch_array($query)) {
									
								 ?> 
								<td>
								<div class="name-avatar d-flex align-items-center">
										<div class="txt mr-2 flex-shrink-0">
											<b><?php echo htmlentities($cnt);?></b>
										</div>
									</div>
								</td>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<div class="txt">
											<div class="weight-600"><?php echo $row['name'];?></div>
										</div>
									</div>
								</td>
								<td><?php echo $row['email']; ?></td>
								<td><?php echo $row['message']; ?></td>
	                           
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="messages.php?delete=<?php echo $row['id']; ?>"><i class="dw dw-delete-3"></i> Delete</a>
										</div>
									</div>
								</td>
							</tr>
							<?php $cnt++; }?>
						</tbody>
					</table>
			   </div>
			</div>

			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->

	<script src="../vendors/scripts/core.js"></script>
	<script src="../vendors/scripts/script.min.js"></script>
	<script src="../vendors/scripts/process.js"></script>
	<script src="../vendors/scripts/layout-settings.js"></script>
	<script src="../src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="../src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="../src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="../src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="../src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>

	<!-- buttons for Export datatable -->
	<script src="../src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="../src/plugins/datatables/js/vfs_fonts.js"></script>
	
	<script src="../vendors/scripts/datatable-setting.js"></script></body>
</body>
</html>