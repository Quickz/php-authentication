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
	?>
	<?php else : ?>

		<h1>Registration</h1>
		<form action="registration.php" method="post">
			<label>Username:</label>
			<input type="text" name="username" autofocus><br>
			<label>Password:</label>
			<input type="password" name="password">
			<input type="submit" value="Sign Up">
		</form>

	<?php endif; ?>

</body>
</html>
