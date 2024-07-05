<?php
	include "../../db_conn.php";

	// extract($_POST);

	if(!empty($_POST["studentname"])) {
		$query = "SELECT * FROM tbl_students WHERE student_name='" . $_POST['studentname'] . "'";
		$result = mysqli_query($conn,$query);
		$count = mysqli_num_rows($result);
		if($count > 0) {
			echo "<span class='badge bg-danger' id='check-studentname-badge'> Student name already exists</span>";
		} else {
			echo "<span class='badge bg-success' id='check-studentname-badge'> Student name is available</span>";
		}
	}
	if(!empty($_POST["studentnumber"])) {
		$query = "SELECT * FROM tbl_students WHERE student_number='" . $_POST['studentnumber'] . "'";
		$result = mysqli_query($conn,$query);
		$count = mysqli_num_rows($result);
		if($count > 0) {
			echo "<span class='badge bg-danger' id='check-studentnumber-badge'> Student number already exists</span>";
		} else {
			echo "<span class='badge bg-success' id='check-studentnumber-badge'> Student number is available</span>";
		}
	}
	if(!empty($_POST["username"])) {
		$query = "SELECT * FROM tbl_students WHERE Username='" . $_POST['username'] . "'";
		$result = mysqli_query($conn,$query);
		$count = mysqli_num_rows($result);
		if($count > 0) {
			echo "<span class='badge bg-danger' id='check-username-badge'> Username already exists</span>";
		} else {
			echo "<span class='badge bg-success' id='check-username-badge'> Username is available</span>";
		}
	}
	if(!empty($_POST["email"])) {
		$query = "SELECT * FROM tbl_students WHERE Email='" . $_POST['email'] . "'";
		$result = mysqli_query($conn,$query);
		$count = mysqli_num_rows($result);
		if($count > 0) {
			echo "<span class='badge bg-danger' id='check-email-badge'> Email already exists</span>";
		} else {
			echo "<span class='badge bg-success' id='check-email-badge'> Email is available</span>";
		}
	}
	if(!empty($_POST["update_username"])) {
		$query = "SELECT * FROM tbl_students WHERE Username='" . $_POST['update_username'] . "'";
		$result = mysqli_query($conn,$query);
		$count = mysqli_num_rows($result);
		if($count > 0) {
			echo "<span class='badge bg-danger' id='check-update-username-badge'> Username already exists</span>";
		} else {
			echo "<span class='badge bg-success' id='check-update-username-badge'> Username is available</span>";
		}
	}
	if(!empty($_POST["update_email"])) {
		$query = "SELECT * FROM tbl_students WHERE Email='" . $_POST['update_email'] . "'";
		$result = mysqli_query($conn,$query);
		$count = mysqli_num_rows($result);
		if($count > 0) {
			echo "<span class='badge bg-danger' id='check-update-email-badge'> Email already exists</span>";
		} else {
			echo "<span class='badge bg-success' id='check-update-email-badge'> Email is available</span>";
		}
	}
	if(!empty($_POST["update_studentname"])) {
		$query = "SELECT * FROM tbl_students WHERE student_name='" . $_POST['update_studentname'] . "'";
		$result = mysqli_query($conn,$query);
		$count = mysqli_num_rows($result);
		if($count > 0) {
			echo "<span class='badge bg-danger' id='check-update-studentname-badge'> Student Name already exists</span>";
		} else {
			echo "<span class='badge bg-success' id='check-update-studentname-badge'> Student Name is available</span>";
		}
	}
	if(!empty($_POST["update_studentnumber"])) {
		$query = "SELECT * FROM tbl_students WHERE student_number='" . $_POST['update_studentnumber'] . "'";
		$result = mysqli_query($conn,$query);
		$count = mysqli_num_rows($result);
		if($count > 0) {
			echo "<span class='badge bg-danger' id='check-update-studentnumber-badge'> Student Number already exists</span>";
		} else {
			echo "<span class='badge bg-success' id='check-update-studentnumber-badge'> Student Number is available</span>";
		}
	}
?>