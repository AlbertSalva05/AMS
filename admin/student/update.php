<?php
	include "../../db_conn.php";


	if(isset($_POST['updateid'])) {
		$user_id = $_POST['updateid'];
		$sql = "SELECT * FROM `tbl_students` WHERE student_id = $user_id";

		$result = mysqli_query($conn,$sql);
		$response = array();
		while($row=mysqli_fetch_assoc($result)) {
			$response = $row;
		}
		echo json_encode($response);
	} else {
		$response['status']=200;
		$response['message']="invalid data or data not found";
	}
	// $conn->close();

	if(isset($_POST['hiddendata'])) {
		$studentid = $_POST['hiddendata'];
		$studentname = $_POST['updatestudentname'];
		$studentnumber = $_POST['updatestudentnumber'];
		$studentcourse = $_POST['updatestudentcourse'];
		$username = $_POST['updateusername'];
		$password = $_POST['updatepassword'];
		$email = $_POST['updateemail'];
		$role = $_POST['updaterole'];

		$sql = "UPDATE `tbl_students` set student_name='$studentname', student_number='$studentnumber', student_course='$studentcourse', username='$username', password='$password', email='$email', role='$role' where student_id='$studentid'";
		$result = mysqli_query($conn,$sql);
	}else {
		// $response['status']=200;
		$response['message']="invalid data or data not found";
	}

?>
