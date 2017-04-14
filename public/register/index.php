<?php
	
	require __DIR__.'/../../vendor/autoload.php';
	use Auth\Auth;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>

	<?php if (Auth::isLogged()) :
		header('Location: ../');
		exit();
	?>
	<?php else : ?>

		<h1>Registration</h1>
		<form action="registration.php" method="post">
			<label>Username:</label>
			<input title="Must be 3-25 symbols long containing only numbers and/or characters." type="text" name="username" minlength="3" maxlength="25" pattern="[a-zA-Z0-9]+" autofocus required><br>
			<label>Password:</label>
			<input title="Must be 8-50 symbols long." type="password" name="password" minlength="8" maxlength="50" pattern=".{8,50}" required>
			<input type="submit" value="Sign Up">
		</form>

	<?php endif; ?>

	<?php if (Auth::hasWarning()) : ?>
		<script>
			alert(
				<?php echo '"'.Auth::getWarning().'"'; ?>
			);
		</script>
	<?php endif; ?>

</body>
</html>
