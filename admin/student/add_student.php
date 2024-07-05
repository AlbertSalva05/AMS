<?php 
	include "../../db_conn.php";

	extract($_POST);

	if(isset($_POST['studentnameData']) && isset($_POST['studentnumberData']) && isset($_POST['studentcourseData']) && isset($_POST['usernameData']) && isset($_POST['passwordData']) && isset($_POST['emailData']) && isset($_POST['roleData'])) {
		$sql = "INSERT INTO `tbl_students` (`student_name`,`student_number`,`student_course`,`Username`, `Password`, `Email`, `Role`) VALUES ('$studentnameData','$studentnumberData','$studentcourseData','$usernameData','$passwordData','$emailData','$roleData')";

		$result = mysqli_query($conn,$sql);
		$conn->close();
	}

?>
