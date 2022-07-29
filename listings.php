<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$title = $_POST['title'];
	$message = $_POST['message'];
	$user_name = $user_data['user_name'];
	$query = "insert into listings (title,message,user) values ('$title','$message','$user_name')";
	if (!empty($title) && !empty($message))
	{
		mysqli_query($con,$query);
		echo '<script>location.replace("listings.php")</script>';
	}else
	{
		
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Social Credits - Listings</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	</head>
	<body>
		<p style="font-family:verdana">
			<h1>Listings</h1> <br> <br>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Id</th>
						<th scope="col">Username</th>
						<th scope="col">Listing Title</th>
						<th scope="col">Listing description</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql = "Select * from `listings`";
						$result = mysqli_query($con, $sql);
						if ($result) {
							while ($row = mysqli_fetch_assoc($result)) {
								$id = $row['id'];
								$title = $row['title'];
								$message = $row['message'];
								$user = $row['user'];
								// display listings
								echo '<tr> 
								<th>'.$id.'</th> 
								<td>'.$user.'</td> 
								<td>'.$title.' </td> 
								<td>'.$message.'</td> 
								</tr>';
							}
						}
					?>
				</tbody>
			</table> <br> <br> <br> <br>
			<form method="post">
				<button type="submit" class="btn btn-primary" onclick="onEvent()">Add listing</button> <br>
				<input type="text" name="title" placeholder="Listing Title" class="form-control"> <br>
				<input type="text" name="message" placeholder="Listing Message" class="form-control"> <br>
			</form>
		</p>
	</body>
</html>