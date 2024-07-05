<?php 
	include "../db_conn.php";

	extract($_POST);

	if(isset($_POST['displaySend'])) {
		$sql_student = "SELECT * from `tbl_students`";
		if ($result_student = mysqli_query($conn, $sql_student)) {
			$student_count = mysqli_num_rows($result_student);
		}
		echo $student_count;
	}


?>
