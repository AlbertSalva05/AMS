<?php
	include "../db_conn.php";


	if(isset($_POST['viewid'])) {
		$user_id = $_POST['viewid'];
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

?>
