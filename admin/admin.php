<?php
	session_start();
	include "../db_conn.php";
	if (isset($_SESSION['admin_id']) && isset($_SESSION['Username'])) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/css/common.css">
        <link rel="stylesheet" type="text/css" href="/css/dataTables.dataTables.min.css">
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<style>
			.custom-sidebar {
				height: 100%;
			}
			#displayDataTable {
				min-height: 400px;
				overflow-y: auto;
				margin-bottom: 80px;
			}
			#displayDataTable::-webkit-scrollbar {
				width: 0.3em;
				height:10px;
			}
			#displayDataTable::-webkit-scrollbar-track {
				-webkit-box-shadow: inset 0 0 3px rgba(0,0,0,0.3);
			}
			#displayDataTable::-webkit-scrollbar-thumb {
			background-color: #0d6efd;
			outline: 1px solid #0d6efd;
			}
			#displayDataTable .fixTableHead {
				overflow-y: auto;
				max-height: 480px;
			}
			#displayDataTable .fixTableHead thead {
				position: sticky;
				top: 0;
			}
			.w10p {
				width: 10%;
			}
			.w20p {
				width: 20%;
			}
			.w25p {
				width: 25%;
			}
			.w15p {
				width: 15%;
			}
		</style>
    </head>
    <body>
		<div class="container-fluid">
			<div class="row d-flex">
				<div class="col-2 px-0">
					<div class="d-flex flex-column flex-shrink-0 p-3 bg-dark custom-sidebar">
						<a href="/" class="d-flex flex-column align-items-center justify-content-center mb-3 mb-md-0 text-decoration-none">
							<span class="fs-4 mb-3"><img src="/img/login_image.png" class="pr-2" style="width: 150px;" alt="logo"></span>
							<span class="fs-4 link-light"><strong>CLAMS</strong></span>
						</a>
						<hr class="bg-light">
						<ul class="nav nav-pills flex-column">
							<li class="nav-item">
								<a href="/admin/home.php" class="nav-link" aria-current="page"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp;DASHBOARD</a>
							</li>
							<li>
								<a href="/admin/admin.php" class="nav-link active" aria-current="page"><i class="fa fa-gear" aria-hidden="true"></i>&nbsp;&nbsp;ADMIN MAINTENANCE</a>
							</li>
							<li>
								<a href="/admin/student/student.php" class="nav-link"><i class="fa fa-user" aria-hidden="true"></i> &nbsp;STUDENTS</a>
							</li>
							<li>
								<a href="/admin/monitoring/index.php" class="nav-link"><i class="fa fa-desktop" aria-hidden="true"></i> &nbsp;PC MONITORING</a>
							</li>
						</ul>
						<hr class="bg-light">
						<div class="dropdown">
							<a href="#" class="d-flex align-items-center link-light text-decoration-none" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
								<img src="/img/image.png" alt="" width="35" height="30" class="rounded-circle me-2">
								<strong>USER: <?php echo $_SESSION['Role']; ?> </strong>
							</a>
						</div>
					</div>
				</div>
				<div class="col-10 px-0 custom-right-panel">
					<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
						<div class="container-fluid">
							<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav me-auto mb-2 mb-lg-0">
									<li class="nav-item">
										<a class="nav-link active px-0" aria-current="page" href="#">COMPUTER LABORATORY MANAGEMENT SYSTEM </a>
									</li>
								</ul>
								<div class="d-flex">
									<ul class="navbar-nav me-auto mb-2 mb-lg-0">
										<li class="nav-item dropdown">
											<a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="/img/image.png" alt="" width="35" height="30" class="rounded-circle me-2">Hello, <?php echo $_SESSION['Username']; ?> </a>
											<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
												<li>
													<a class="dropdown-item" href="#">Action</a>
												</li>
												<li>
													<hr class="dropdown-divider">
												</li>
												<li>
													<a class="dropdown-item" href="/admin/logout.php">Logout</a>
												</li>
											</ul>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</nav>
					<div class="container-fluid mt-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="/admin/home.php">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Admin Maintenance</li>
							</ol>
						</nav>
					</div>
					<div class="container-fluid mt-5">
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fa fa-plus" aria-hidden="true"></i> Add New Admin</button>
						<div class="container-fluid row mt-2">
							<!-- Add Modal -->
							<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header bg-info text-light">
											<h5 class="modal-title mb-0" id="addModalLabel"><i class="fa fa-plus" aria-hidden="true"></i> Add New Admin</h5>
											<button type="button" class="btn-close custom-modal-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<h6 class="card-title">Admin Information</h6>
											<hr class="dropdown-divider">
											<div class="row g-3">
												<div class="col-12">
													<label for="username" class="form-label">Username <span class="text-light fs-6 ms-3" id="check-username"></span></label>
													<input type="text" class="form-control" id="username" placeholder="Enter your username" onInput="checkUsername()">
												</div>
												<div class="col-12">
													<label for="password" class="form-label">Password</label>
													<input type="password" class="form-control" id="password" placeholder="Enter your password">
												</div>
												<div class="col-12">
													<label for="email" class="form-label">Email <span class="text-light fs-6 ms-3" id="check-email"></span></label>
													<input type="email" class="form-control" id="email" placeholder="Enter your email" onInput="checkEmail()">
												</div>
												<div class="col-12">
													<label for="role" class="form-label">Role</label>
													<input type="text" class="form-control" id="role" placeholder="Enter your role">
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
											<button type="button" class="btn btn-success" onclick="addUser()" id="btnSaveAdmin">Save changes</button>
										</div>
									</div>
								</div>
							</div>
							<!-- Update Modal -->
							<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header bg-info text-light">
											<h5 class="modal-title mb-0" id="updateModalLabel"><i class="fa fa-pencil" aria-hidden="true"></i> Update Admin Details</h5>
											<button type="button" class="btn-close custom-modal-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<h6 class="card-title">Admin Information</h6>
											<hr class="dropdown-divider">
											<div class="row g-3">
												<div class="col-12">
													<label for="update_username" class="form-label">Username <span class="text-light fs-6 ms-3" id="check-update-username"></span></label>
													<input type="text" class="form-control" id="update_username" placeholder="Enter your username" onInput="checkUpdateUsername()">
												</div>
												<div class="col-12">
													<label for="update_password" class="form-label">Password</label>
													<input type="password" class="form-control" id="update_password" placeholder="Enter your password">
												</div>
												<div class="col-12">
													<label for="update_email" class="form-label">Email <span class="text-light fs-6 ms-3" id="check-update-email"></span></label>
													<input type="email" class="form-control" id="update_email" placeholder="Enter your email" onInput="checkUpdateEmail()">
												</div>
												<div class="col-12">
													<label for="update_role" class="form-label">Role</label>
													<input type="text" class="form-control" id="update_role" placeholder="Enter your role">
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnUpdateClose" onclick="clearFields();">Close</button>
											<button type="button" class="btn btn-info text-light" data-bs-toggle="modal" data-bs-target="#confirmUpdateModal" id="btnUpdate" onclick="btnUpdate()">Update</button>
											<input type="hidden" name="hidden" id="hiddendata">
										</div>
									</div>
								</div>
							</div>
							<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="confirmUpdateModal" tabindex="-1" aria-labelledby="confirmUpdateModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<form action="" method="post">
											<div class="modal-header bg-warning text-light">
												<h5 class="modal-title" id="confirmUpdateModalLabel"><i class="fa fa-times"></i> Warning!!</h5>
												<button type="button" class="btn-close custom-modal-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<div class="row g-3">
													<div class="col-12">
														<h6 class="fw-bold">Are you sure you want to update the details of this admin user?</h6>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
												<button type="button" class="btn btn-info confirm_update_btn text-light" name="confirmUpdate" onclick="updateUser();" id="btnUpdateAdmin" data-bs-dismiss="modal">Save Changes</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- View Modal -->
							<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header bg-info text-light">
											<h5 class="modal-title mb-0" id="viewModalLabel"><i class="fa fa-eyes" aria-hidden="true"></i> View Admin Details</h5>
											<button type="button" class="btn-close custom-modal-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<h6 class="card-title">Admin Information</h6>
											<hr class="dropdown-divider">
											<div class="row g-3">
												<div class="col-12">
													<label for="view_username" class="form-label">Username <span class="text-light fs-6 ms-3" id="check-username"></span></label>
													<input type="text" class="form-control" id="view_username" placeholder="Enter your username" disabled readonly>
												</div>
												<div class="col-12">
													<label for="view_password" class="form-label">Password</label>
													<input type="password" class="form-control" id="view_password" placeholder="Enter your password" disabled readonly>
												</div>
												<div class="col-12">
													<label for="view_email" class="form-label">Email <span class="text-light fs-6 ms-3" id="check-email"></span></label>
													<input type="email" class="form-control" id="view_email" placeholder="Enter your email" disabled readonly>
												</div>
												<div class="col-12">
													<label for="view_role" class="form-label">Role</label>
													<input type="text" class="form-control" id="view_role" placeholder="Enter your role" disabled readonly>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
											<input type="hidden" name="hidden" id="hiddenviewdata">
										</div>
									</div>
								</div>
							</div>
							<!-- Add Success Modal -->
							<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="addSuccessModal" tabindex="-1" aria-labelledby="addSuccessModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header bg-success text-light">
											<h5 class="modal-title" id="addSuccessModalLabel"><i class="fa fa-check"></i> Success</h5>
											<button type="button" class="btn-close custom-modal-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<div class="row g-3">
												<div class="col-12">
													<h6 class="fw-bold">You have successfully created a new Admin!</span></h6>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="javascript:window.location.reload()">Close</button>
										</div>
									</div>
								</div>
							</div>
							<!-- Delete Success Modal -->
							<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="deleteSuccessModal" tabindex="-1" aria-labelledby="deleteSuccessModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header bg-success text-light">
											<h5 class="modal-title" id="deleteSuccessModalLabel"><i class="fa fa-check"></i> Success</h5>
											<button type="button" class="btn-close custom-modal-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<div class="row g-3">
												<div class="col-12">
													<h6 class="fw-bold">You have successfully deleted the Admin details!</span></h6>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
							<!-- Add Update Success Modal -->
							<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="updateSuccessModal" tabindex="-1" aria-labelledby="updateSuccessModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header bg-success text-light">
											<h5 class="modal-title" id="updateSuccessModalLabel"><i class="fa fa-check"></i> Success</h5>
											<button type="button" class="btn-close custom-modal-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<div class="row g-3">
												<div class="col-12">
													<h6 class="fw-bold">You have successfully updated the Admin Details!</span></h6>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
							<!-- Add Error Modal -->
							<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="addWarningModal" tabindex="-1" aria-labelledby="addWarningModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header bg-warning text-light">
											<h5 class="modal-title" id="addWarningModalLabel"><i class="fa fa-exclamation-triangle"></i> Error</h5>
											<button type="button" class="btn-close custom-modal-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<div class="row g-3">
												<div class="col-12">
													<h6 class="fw-bold">Please fill-out the Admin Information.<br>All fields are required.</h6>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
							<!-- Add Error 01 Modal -->
							<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="addErrorModal01" tabindex="-1" aria-labelledby="addErrorModal01Label" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header bg-danger text-light">
											<h5 class="modal-title" id="addErrorModal01Label"><i class="fa fa-times"></i> Error</h5>
											<button type="button" class="btn-close custom-modal-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<div class="row g-3">
												<div class="col-12">
													<h6 class="fw-bold">Username already exist, try something else.</h6>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
							<!-- Add Error 02 Modal -->
							<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="addErrorModal02" tabindex="-1" aria-labelledby="addErrorModal02Label" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header bg-danger text-light">
											<h5 class="modal-title" id="addErrorModal02Label"><i class="fa fa-times"></i> Error</h5>
											<button type="button" class="btn-close custom-modal-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<div class="row g-3">
												<div class="col-12">
													<h6 class="fw-bold">Email already exist, try something else.</h6>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
							<!-- Delete Modal -->
							<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<form action="" method="post">
											<div class="modal-header bg-warning text-light">
												<h5 class="modal-title" id="deleteUserModalLabel"><i class="fa fa-times"></i> Warning!!</h5>
												<button type="button" class="btn-close custom-modal-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<div class="row g-3">
													<div class="col-12">
														<h6 class="fw-bold">Are you sure you want to delete this admin user?</h6>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
												<button type="button" class="btn btn-danger confirm_delete_btn" name="confirmDelete" onclick="deleteUser();" id="btnDeleteAdmin" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#deleteSuccessModal">Delete</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-4">
							<div id="displayDataTable">
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
        <script src="/js/bootstrap.bundle.min.js"></script>
		<script src="/js/jquery-3.7.1.js"></script>
		<script src="/js/popper.min.js" ></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/dataTables.min.js"></script>
		<script src="/js/bootbox.min.js"></script>


		<script>
			$(document).ready(function () {
				displayData();
				$('#displayDataTableData').DataTable();
			});

			// display all records
			function displayData() {
				var displayData = "true";
				$.ajax({
					url: 'display.php',
					type: 'post',
					data: {
						displaySend: displayData
					},
					success: function(data,status) {
						$("#displayDataTable").html(data);
						$('#displayDataTableData').DataTable(data);
					}
				});
			}

			// validate and check username if already exists
			function checkUsername() {
				$.ajax({
					url: 'validate_user.php',
					data: 'username='+$("#username").val(),
					type: 'post',
					success: function(data) {
						$("#check-username").html(data);
					}
				});
			}

			// validate and check email if already exists
			function checkEmail() {
				$.ajax({
					url: 'validate_user.php',
					data: 'email='+$("#email").val(),
					type: 'post',
					success: function(data) {
						$("#check-email").html(data);
					}
				});
			}

			// validate and check update username if already exists
			function checkUpdateUsername() {
				$.ajax({
					url: 'validate_user.php',
					data: 'username='+$("#update_username").val(),
					type: 'post',
					success: function(data) {
						$("#check-update-username").html(data);
					}
				});
			}

			// validate and check update email if already exists
			function checkUpdateEmail() {
				$.ajax({
					url: 'validate_user.php',
					data: 'email='+$("#update_email").val(),
					type: 'post',
					success: function(data) {
						$("#check-update-email").html(data);
					}
				});
			}

			// clear all input fields after submit
			function clearFields() {
				$('#username').val('');
				$('#password').val('');
				$('#email').val('');
				$('#role').val('');
			}

			// remove all badge indicator after submit
			function clearFormBadges() {
				$("#check-username-badge").css('display','none');
				$("#check-email-badge").css('display','none');
				$("#check-update-username-badge").css('display','none');
				$("#check-update-email-badge").css('display','none');
			}

			// close error modals
			function closeErrorModals() {
				$('#addErrorModal01').modal('hide');
				$('#addErrorModal02').modal('hide');
			}

			// close positive modals
			function closePosModals() {
				$('#addWarningModal').modal('hide');
				$('#addModal').modal('hide');
				$('#addSuccessModal').modal('hide')
			}

			// close warning modals
			function showAddWarningModal() {
				$('#addWarningModal').modal('show');
				$('#addModal').modal('hide');
				$('#addSuccessModal').modal('hide');
				closeErrorModals();
			}

			// reload page when success modal is closed
			function addSuccessModalCloseBtnRaload() {
				location.reload();
			}

			// add admin function
			function addUser() {
				var usernameAdd = $('#username').val();
				var passwordAdd = $('#password').val();
				var emailAdd = $('#email').val();
				var roleAdd = $('#role').val();

				if(usernameAdd.length === 0 || usernameAdd.length === "") {
					showAddWarningModal();
				}
				else if(passwordAdd.length === 0 || passwordAdd.length === "") {
					showAddWarningModal();
				}
				else if(emailAdd.length === 0 || emailAdd.length === "") {
					showAddWarningModal();
				}
				else if(roleAdd.length === 0 || roleAdd.length === "") {
					showAddWarningModal();
				}
				else if($("#check-username-badge").hasClass("bg-danger")) {
					$('#addErrorModal02').modal('hide');
					$('#addErrorModal01').modal('show');
					clearFields();
					clearFormBadges();
					closePosModals();
				}
				else if($("#check-email-badge").hasClass("bg-danger")) {
					$('#addErrorModal01').modal('hide');
					$('#addErrorModal02').modal('show');
					clearFields();
					clearFormBadges();
					closePosModals();
				}
				else {
					$.ajax({
						url: 'add_admin.php',
						type: 'post',
						data: {
							usernameData: usernameAdd,
							passwordData: passwordAdd,
							emailData: emailAdd,
							roleData: roleAdd
						},
						success: function(data,status) {
							clearFields();
							closeErrorModals();
							clearFormBadges();
							$('#addModal').modal('hide');
							$('#addWarningModal').modal('hide');
							$('#addSuccessModal').modal('show');
						}
					});
				}
			}

			function getRowDelete(id) {
				$('#deleteUserModal').modal('show');
				$("#btnDeleteAdmin").click(function() {
					deleteUser(id);
				})
			}

			// delete admin function
			function deleteUser(deleteid) {
				$.ajax({
					url: 'delete.php',
					type: 'post',
					data: {
						deleteSend: deleteid
					},
					success: function(data,status) {
						displayData();
						$('#displayDataTableData').DataTable();
						if(data.success===1) {
							$('#deleteUserModal').modal('hide');
							$('#deleteSuccessModal').modal('show');
						}
					}
				});
			}

			// view admin function
			function viewUser(viewid) {
				$('#hiddenviewdata').val(viewid);
				$.post("view.php",{viewid:viewid},function(data,status) {
					var viewid = JSON.parse(data);
					$('#view_username').val(viewid.Username);
					$('#view_password').val(viewid.Password);
					$('#view_email').val(viewid.Email);
					$('#view_role').val(viewid.Role);
				});
				$('#viewModal').modal('show');
			}

			// update admin function
			function getDetailsUser(updateid) {
				$('#hiddendata').val(updateid);
				$.post("update.php",{updateid:updateid},function(data,status) {
					var userid = JSON.parse(data);
					$('#update_username').val(userid.Username);
					$('#update_password').val(userid.Password);
					$('#update_email').val(userid.Email);
					$('#update_role').val(userid.Role);
				});
				$('#updateModal').modal('show');
			}

			function btnUpdate() {
				$('#updateModal').modal('hide');
			}

			// update admin function
			function updateUser() {
				var updateusername = $('#update_username').val();
				var updatepassword = $('#update_password').val();
				var updateemail = $('#update_email').val();
				var updaterole = $('#update_role').val();
				var hiddendata = $('#hiddendata').val();

				if(updateusername.length === 0 || updateusername.length === "") {
					showAddWarningModal();
				}
				else if(updatepassword.length === 0 || updatepassword.length === "") {
					showAddWarningModal();
				}
				else if(updateemail.length === 0 || updateemail.length === "") {
					showAddWarningModal();
				}
				else if(updaterole.length === 0 || updaterole.length === "") {
					showAddWarningModal();
				}
				else if($("#check-update-username-badge").hasClass("bg-danger")) {
					$('#addErrorModal02').modal('hide');
					$('#addErrorModal01').modal('show');
					clearFields();
					clearFormBadges();
					closePosModals();
				}
				else if($("#check-update-email-badge").hasClass("bg-danger")) {
					$('#addErrorModal01').modal('hide');
					$('#addErrorModal02').modal('show');
					clearFields();
					clearFormBadges();
					closePosModals();
				} else {
					$.post("update.php", {
						updateusername: updateusername,
						updatepassword: updatepassword,
						updateemail: updateemail,
						updaterole: updaterole,
						hiddendata: hiddendata
					},function(data,status){
						$('#updateModal').modal('hide');
						$('#updateSuccessModal').modal('show');
						displayData();
					});
				}
			}
		</script>
    </body>
</html>
<?php
	} else{
		header("Location: index.php");
		exit();
	}
?>