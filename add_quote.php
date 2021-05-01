<?php
include('check_auth.php');
if ($_SERVER['REQUEST_METHOD']=='POST'):
	$quote = $_POST['form_quote'];
	include('mysqli_connect.php');
	$query = "INSERT INTO quote (quote) VALUES ('$quote')";
	mysqli_query($dbc, $query) or die(mysqli_error($dbc));
	mysqli_close($dbc);
	header('location:index.php');
	exit();
endif;
?><!DOCTYPE html>
<html>
<head>
	<title>Quotes</title>
</head>
<body>
	<h1>Add quote</h1>
	<form method="post" action="add_quote.php">
		<div>
			<label>Quote</label>
			<textarea name="form_quote"></textarea>
		</div>
		<button>Submit</button>
	</form>
	<p><a href="index.php">Back</a>
	</body>
	</html>