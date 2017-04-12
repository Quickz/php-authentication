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

		<h1>Login</h1>
		<form action="login.php" method="post">
			<label>Username:</label>
			<input type="text" name="username" autofocus required><br>
			<label>Password:</label>
			<input type="password" name="password" required>
			<input type="submit" value="Sign in">
		</form>

	<?php endif; ?>

</body>
</html>
