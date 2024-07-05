<?php 
	include "../db_conn.php";

	extract($_POST);

	if(isset($_POST['displaySend'])) {
		$sql_admin = "SELECT * from `tbl_admins`";
		if ($result_admin = mysqli_query($conn, $sql_admin)) {
			$admin_count = mysqli_num_rows($result_admin);
		}
		echo $admin_count;
	}


?>
