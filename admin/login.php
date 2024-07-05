<?php
	session_start();
	include "../db_conn.php";

	if (isset($_POST['username']) && isset($_POST['password'])) {
		function validate($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$Username = validate($_POST['username']);
		$Password = validate($_POST['password']);

		if (empty($Username)) {

			header("Location: /admin/index.php?error=Username is required");
			exit();

		} else if(empty($Password)){

			header("Location: /admin/index.php?error=Password is required");
			exit();

		} else{

			$sql = "SELECT * FROM tbl_admins WHERE Username='$Username' AND Password='$Password' AND Role='admin'";

			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) === 1) {

				$row = mysqli_fetch_assoc($result);

				if ($row['Username'] === $Username && $row['Password'] === $Password) {
					$_SESSION['Username'] = $row['Username'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['admin_id'] = $row['admin_id'];
					$_SESSION['Role'] = $row['Role'];

					header("Location: /admin/home.php");
					exit();
				}
				else {
					header("Location: /admin/index.php?error=Incorrect Username or password");
					exit();
				}
			} else {
				header("Location: /admin/index.php?error=Incorrect Username or password");
				exit();
			}
		}
	} else{
		header("Location: /admin/index.php");
		exit();
	}
?>