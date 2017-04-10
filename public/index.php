<?php
	
	require __DIR__.'/../vendor/autoload.php';
	use Auth\Auth;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<?php if (Auth::isLogged()) : ?>

		<h1>Greetings, <?php echo Auth::getUser()->getName(); ?>!</h1>
		<form action="logout.php" method="post">
			<input id="logout" type="submit" value="Logout">
		</form>

	<?php else : ?>

		<h1>Welcome</h1>
		<form action="login.php" method="post">
			<label>Username:</label>
			<input id="username" type="text" name="username" autofocus><br>
			<label>Password:</label>
			<input id="password" type="password" name="password">
			<input id="login" type="submit" value="Login">
		</form>

	<?php endif; ?>

</body>
</html>
