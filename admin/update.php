<?php
	include "../db_conn.php";


	if(isset($_POST['updateid'])) {
		$user_id = $_POST['updateid'];
		$sql = "SELECT * FROM `tbl_admins` WHERE admin_id = $user_id";

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
		$adminid = $_POST['hiddendata'];
		$username = $_POST['updateusername'];
		$password = $_POST['updatepassword'];
		$email = $_POST['updateemail'];
		$role = $_POST['updaterole'];

		$sql = "UPDATE `tbl_admins` set username='$username', password='$password', email='$email', role='$role' where admin_id='$adminid'";
		$result = mysqli_query($conn,$sql);
	}

?>
