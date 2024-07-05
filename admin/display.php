<?php 
	include "../db_conn.php";

	extract($_POST);

	if(isset($_POST['displaySend'])) {
		$table='<table class="table fixTableHead table-striped table-hover" id="displayDataTableData">
		<thead class="bg-primary text-light">
			<tr>
				<th scope="col">#ID</th>
				<th scope="col">Username</th>
				<th scope="col">Email</th>
				<th scope="col">Role</th>
				<th scope="col">Actions</th>
			</tr>
		</thead>';
		$sql = "SELECT * from `tbl_admins`";
		$result = mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($result)) {
			$id = $row["admin_id"];
			$username = $row["Username"];
			$password = $row["Password"];
			$email = $row["Email"];
			$role = $row["Role"];
			$table.='<tr>
				<td>'.$id.'</td>
				<td>'.$username.'</td>
				<td>'.$email.'</td>
				<td>'.$role.'</td>
				<td>
					<button type="button" class="btn btn-primary text-light" onclick="viewUser('.$id.')"><i class="fa fa-eye" aria-hidden="true"></i> &nbsp;View</button>
					<button type="button" class="btn btn-info text-light ms-2" onclick="getDetailsUser('.$id.')"><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp;Update</button>
					<button type="button" class="btn btn-danger text-light ms-2" onclick="getRowDelete('.$id.')"><i class="fa fa-times" aria-hidden="true"></i> &nbsp;Delete</button>
				</td>
			</tr>';
		}
		$table.='</table>';
		echo $table;

	}

?>