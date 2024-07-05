<?php
	include "../db_conn.php";

	// extract($_POST);

	if(!empty($_POST["username"])) {
		$query = "SELECT * FROM tbl_admins WHERE Username='" . $_POST['username'] . "'";
		$result = mysqli_query($conn,$query);
		$count = mysqli_num_rows($result);
		if($count > 0) {
			echo "<span class='badge bg-danger' id='check-username-badge'> Username already exists</span>";
		} else {
			echo "<span class='badge bg-success' id='check-username-badge'> Username is available</span>";
		}
	}
	if(!empty($_POST["email"])) {
		$query = "SELECT * FROM tbl_admins WHERE Email='" . $_POST['email'] . "'";
		$result = mysqli_query($conn,$query);
		$count = mysqli_num_rows($result);
		if($count > 0) {
			echo "<span class='badge bg-danger' id='check-email-badge'> Email already exists</span>";
		} else {
			echo "<span class='badge bg-success' id='check-email-badge'> Email is available</span>";
		}
	}
	if(!empty($_POST["update_username"])) {
		$query = "SELECT * FROM tbl_admins WHERE Username='" . $_POST['update_username'] . "'";
		$result = mysqli_query($conn,$query);
		$count = mysqli_num_rows($result);
		if($count > 0) {
			echo "<span class='badge bg-danger' id='check-update-username-badge'> Username already exists</span>";
		} else {
			echo "<span class='badge bg-success' id='check-update-username-badge'> Username is available</span>";
		}
	}
	if(!empty($_POST["update_email"])) {
		$query = "SELECT * FROM tbl_admins WHERE Email='" . $_POST['update_email'] . "'";
		$result = mysqli_query($conn,$query);
		$count = mysqli_num_rows($result);
		if($count > 0) {
			echo "<span class='badge bg-danger' id='check-update-email-badge'> Email already exists</span>";
		} else {
			echo "<span class='badge bg-success' id='check-update-email-badge'> Email is available</span>";
		}
	}
?>