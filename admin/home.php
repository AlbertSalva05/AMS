<?php
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['Username']) && isset($_SESSION['Role'])) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/css/common.css">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <style>
            .custom-sidebar {
                height: 100vh;
            }
			.bg_card01 {
				background: linear-gradient(45deg, #6d80fe 0%, #23d2fd 100%);
				box-shadow: 0 5px 20px rgba(35, 210, 253, 0.3);
			}
			.bg_card02 {
				background: linear-gradient(45deg, #ff998b 0%, #ff6d88 100%);
				box-shadow: 0 5px 20px rgba(255, 153, 139, 0.3);
			}
			.bg_card03 {
				background: linear-gradient(45deg, #707cff 0%, #fa81e8 100%);
				box-shadow: 0 5px 20px rgba(250, 129, 232, 0.3);
			}
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row d-flex">
                <div class="col-2 px-0">
                    <div class="d-flex flex-column flex-shrink-0 p-3 bg-dark custom-sidebar">
                        <a href="/" class="d-flex flex-column align-items-center justify-content-center mb-3 mb-md-0 text-decoration-none">
                            <span class="fs-4 mb-3">
                                <img src="/img/login_image.png" class="pr-2" style="width: 150px;" alt="logo">
                            </span>
                            <span class="fs-4 link-light">
                                <strong>CLAMS</strong>
                            </span>
                        </a>
                        <hr class="bg-light">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a href="/admin/home.php" class="nav-link active" aria-current="page">
                                    <i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp;DASHBOARD </a>
                            </li>
                            <li>
                                <a href="/admin/admin.php" class="nav-link" aria-current="page">
                                    <i class="fa fa-gear" aria-hidden="true"></i>&nbsp;&nbsp;ADMIN MAINTENANCE </a>
                            </li>
                            <li>
                                <a href="/admin/student/student.php" class="nav-link">
                                    <i class="fa fa-user" aria-hidden="true"></i> &nbsp;STUDENTS </a>
                            </li>
                            <li>
                                <a href="/admin/monitoring/index.php" class="nav-link">
                                    <i class="fa fa-desktop" aria-hidden="true"></i> &nbsp;PC MONITORING </a>
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
                <div class="col-10 px-0">
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
                                            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <img src="/img/image.png" alt="" width="35" height="30" class="rounded-circle me-2">Hello, <?php echo $_SESSION['Username']; ?> </a>
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
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="container-fluid mt-3">
                        <div class="row d-flex">
							<div class="col-md-4 col-sm-4">
								<div class="card bg_card01 text-light">
									<div class="card-body">
										<div class="feature__item">
											<div class="feature__item__icon">
												<div class="icon">
													<h2 class="fs-1"><i class="fa fa-gear" aria-hidden="true"></i></h2>
												</div>
											</div>
											<div class="feature__item__text">
												<h4>ADMIN</h4>
												<p class="mb-1">Total number of Admin Users</p>
												<p class="mb-1 fs-1" id="total_admin_count"></p>
											</div>
										</div>
										<a href="/admin/admin.php" class="btn btn-light"><i class="fa fa-eye" aria-hidden="true"></i> &nbsp;View Admin Page</a>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-4">
								<div class="card bg_card02 text-light">
									<div class="card-body">
										<div class="feature__item">
											<div class="feature__item__icon">
												<div class="icon">
													<h2 class="fs-1"><i class="fa fa-user" aria-hidden="true"></i></h2>
												</div>
											</div>
											<div class="feature__item__text">
												<h4>STUDENT</h4>
												<p class="mb-1">Total number of Student Users</p>
												<p class="mb-1 fs-1" id="total_student_count"></p>
											</div>
										</div>
										<a href="/admin/student/student.php" class="btn btn-light"><i class="fa fa-eye" aria-hidden="true"></i> &nbsp;View Student Page</a>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-4">
								<div class="card bg_card03 text-light">
									<div class="card-body">
										<div class="feature__item">
											<div class="feature__item__icon">
												<div class="icon">
													<h2 class="fs-1"><i class="fa fa-desktop" aria-hidden="true"></i></h2>
												</div>
											</div>
											<div class="feature__item__text">
												<h4>PC </h4>
												<p class="mb-1">Total number of Available PC</p>
												<p class="mb-1 fs-1" id="total_pc_count"></p>
											</div>
										</div>
										<a href="/admin/monitoring/student.php" class="btn btn-light"><i class="fa fa-eye" aria-hidden="true"></i> &nbsp;View PC Monitoring Page</a>
									</div>
								</div>
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
				getAdminCount();
				getStudentCount();
			});

			function getAdminCount() {
				var displayData = "true";
				$.ajax({
					url: 'getTotalAdmin.php',
					type: 'post',
					data: {
						displaySend: displayData
					},
					success: function(data,status) {
						$("#total_admin_count").html(data);
					}
				});
			}
			function getStudentCount() {
				var displayData = "true";
				$.ajax({
					url: 'getTotalStudent.php',
					type: 'post',
					data: {
						displaySend: displayData
					},
					success: function(data,status) {
						$("#total_student_count").html(data);
					}
				});
			}
			function getPCActiveCount() {
				var displayData = "true";
				$.ajax({
					url: 'getTotalPCStatus.php',
					type: 'post',
					data: {
						displaySend: displayData
					},
					success: function(data,status) {
						$("#total_pc_count").html(data);
					}
				});
			}

		</script>
    </body>
</html> <?php
	} else{
		header("Location: index.php");
		exit();
	}
?>