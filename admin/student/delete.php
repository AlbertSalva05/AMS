<?php 
	include "../../db_conn.php";


	if(isset($_POST['deleteSend'])) {
		$unique_id = $_POST['deleteSend'];
		$sql = "DELETE FROM `tbl_students` WHERE student_id = $unique_id";

		$result = mysqli_query($conn,$sql);
		$conn->close();
	}

?>
