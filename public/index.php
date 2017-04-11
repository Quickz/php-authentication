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
			<input type="submit" value="Logout">
		</form>

	<?php else : ?>

		<h1>Welcome</h1>
		<a class="sqr" href="login">Login</a>
		<a class="sqr" href="register">Register</a>

	<?php endif; ?>

</body>
</html>
