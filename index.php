<?php
session_start();
include('mysqli_connect.php');
$query = "SELECT * FROM quote";
$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
mysqli_close($dbc);
?><!DOCTYPE html>
<html>
<head>
	<title>Quotes</title>
</head>
<body>
	<h1>Quotes</h1>
	<?php if (isset($_SESSION['username'])): ?>
		<table>
			<tr>
				<th>Quote</th>
			</tr>
			<?php while ($row = mysqli_fetch_array($result)): ?>
				<tr>
					<td><?php echo $row['quote']; ?></td>
					<td><a href="edit_quote.php?id=<?php echo $row['id']?>">Edit</a></td>
					<td><a href="delete_quote.php?id=<?php echo $row['id']?>">Delete</a></td>

				</tr>
			<?php endwhile; ?>
		</table>
		<p><a href="add_quote.php">Add quote</a></p>
		<p><a href="logout.php">Logout</a></p>
		<?php else: ?>
			<table>
				<tr>
					<th>Quote</th>
				</tr>
				<?php while ($row = mysqli_fetch_array($result)): ?>
					<tr>
						<td><?php echo $row['quote']; ?></td>
					</tr>
				<?php endwhile; ?>
			</table>
			<p><a href="login.php">Login</a></p>
		<?php endif; ?>
	</body>
	</html>