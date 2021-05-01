<?php
include('check_auth.php');
include('mysqli_connect.php');
if ($_SERVER['REQUEST_METHOD']=='POST'):
	$id = $_POST['form_id'];
	$quote = $_POST['form_quote'];
	$query = "UPDATE quote SET quote='$quote' WHERE id=$id";
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
	<h1>Edit quote</h1>
	<form method="post" action="edit_quote.php">
		<div>
			<label>Quote</label>
			<textarea name="form_quote" value="<?php echo $row['quote'] ?>"></textarea>
			<input type="hidden" name="form_id" value="<?php echo $row['id'] ?>">
		</div>
		<button>Submit</button>
	</form>
	<p><a href="index.php">Back</a></p>
</body>
</html>