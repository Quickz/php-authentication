<?php
	session_start();
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php if (isset($_SESSION['username'])) : ?>
		<h1>Greetings, <?php echo $_SESSION['username']; ?>!</h1>
		<button id="logout" onclick="logout()">Logout</button>
	<?php else : ?>
		<h1>Welcome</h1>
		<label>Username:</label>
		<input id="username" type="text" name="username"><br>
		<label>Password:</label>
		<input id="password" type="password" name="password">
		<input id="login" onclick="login()" type="submit" value="Login">
	<?php endif; ?>

	<script src="script.js"></script>
</body>
</html>
