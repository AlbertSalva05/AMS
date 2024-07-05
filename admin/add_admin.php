<?php 
	include "../db_conn.php";

	extract($_POST);

	if(isset($_POST['usernameData']) && isset($_POST['passwordData']) && isset($_POST['emailData']) && isset($_POST['roleData'])) {
		$sql = "INSERT INTO `tbl_admins` (`Username`, `Password`, `Email`, `Role`) VALUES ('$usernameData','$passwordData','$emailData','$roleData')";

		$result = mysqli_query($conn,$sql);
		$conn->close();
	}

?>
