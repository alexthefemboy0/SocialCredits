<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	$min = $_POST['min'];
	$max = $_POST['max'];
	$tag = $_POST['tag'];
	$username = $user_data['user_name'];
	$query = "insert into buyer (user,price_min,price_max,cashtag) values ('$username','$min','$max','$tag')";
	mysqli_query($con,$query);
	header("Location: privateparty.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
		<script src="https://smtpjs.com/v3/smtp.js"></script>
		<title>Buy and sell</title>
	</head>
	<body>
		<p style="font-family:verdana">
			<h1>Buy and sell</h1> <br> <br>
			
			<h2>Current Buyer Listings</h2> <br>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Id</th>
						<th scope="col">Username</th>
						<th scope="col">Minimum USD Price</th>
						<th scope="col">Maximum USD Price</th>
						<th scope="col">Cashtag</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql = "Select * from `buyer`";
						$result = mysqli_query($con, $sql);
						if ($result) {
							while ($row = mysqli_fetch_assoc($result)) {
								$id = $row['id'];
								$user = $row['user'];
								$min = $row['price_min'];
								$max = $row['price_max'];
								$tag = $row['cashtag'];
								// display listings
								echo '<tr> 
								<th>'.$id.'</th> 
								<td>'.$user.'</td> 
								<td>'.$min.' </td> 
								<td>'.$max.'</td>
								<td>'.$tag.'</td>
								</tr>';
							}
						}
					?>
				</tbody>
			</table> <br> <br> <br> <br>
			
			
			
			<h2>Make a buyer listing</h2>
			<form method="post">
				<input type="number" placeholder="Minimum USD amount" name="min"> <br>
				<input type="number" placeholder="Maximum USD amount" name="max"> <br>
				<input type="text" placeholder="$Cashtag (i.e. $AlexanderDev)" name="tag"> <br>
				<button type="submit" class="btn btn-success">Submit buyer listing</button> <br>
				Warning: All selling transactions above 10 Dollars USD (1,000 Social Credits) are subject to a 5 Dollar fee after transaction. Failure to do this will result in account termination. <br>
			</form>
		</p>
	</body>
</html>