<?php
include('check_auth.php');
include('mysqli_connect.php');
if ($_SERVER['REQUEST_METHOD']=='POST'):
	$id = $_POST['form_id'];
	$query = "DELETE FROM quote WHERE id=$id";
	mysqli_query($dbc, $query) or die(mysqli_error($dbc));
	mysqli_close($dbc);
	header('location:index.php');
	exit();
else:
$id = $_GET['id'];
$query = "SELECT * FROM quote WHERE id=$id";
$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
$row = mysqli_fetch_array($result);
mysqli_close($dbc);
endif;
?><!DOCTYPE html>
<html>
<head>
	<title>Quotes</title>
</head>
<body>
	<h1>Delete quote</h1>
	<form method="post" action="delete_quote.php">
		<p>Are you sure you want to delete this quote?</p>
		<p><em><?php echo $row['quote'] ?></em></p>
		<input type="hidden" name="form_id" value="<?php echo $row['id'] ?>">
		<button>Delete</button>
	</form>
	<p><a href="index.php">Back</a></p>
</body>
</html>