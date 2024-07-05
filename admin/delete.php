<?php 
	include "../db_conn.php";


	if(isset($_POST['deleteSend'])) {
		$unique = $_POST['deleteSend'];
		$sql = "DELETE FROM `tbl_admins` WHERE admin_id = $unique";

		$result = mysqli_query($conn,$sql);
		$conn->close();
	}

?>
