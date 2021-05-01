<?php
session_start();
if ($_SERVER['REQUEST_METHOD']=='POST'):
	$username = $_POST['form_username'];
	$password = $_POST['form_password'];
	if ($username == 'admin' && $password == 'test'):
		$_SESSION['username'] = $username;
		header('location:index.php');
		exit();
	endif;
endif;
?><!DOCTYPE html>
<html>
<head>
	<title>Quotes</title>
</head>
<body>
	<h1>Login</h1>
	<form method="post" action="login.php">
		<div>
			<label>Username</label>
			<input type="text" name="form_username">
		</div>
		<div>
			<label>Password</label>
			<input type="password" name="form_password">
		</div>
		<button>Login</button>
		<p><a href="index.php">Back</a></p>
	</form>
</body>
</html>