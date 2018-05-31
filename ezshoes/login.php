<?php
	include("conn.php");
	session_start();
	if ($_POST) {
		$username = $_POST["username"];
		$password = $_POST["password"];

		if ($username == "admin" && $password == "admin") {
			//echo "<script>alert('Login berhasil!')</script>";
			$_SESSION["loggedIn"] = true;
			header("Location: admin.php");
			exit();
		}
		else {
			require_once("databases/Database.php");
			require_once("databases/Pelanggan.php");

			$db = new Pelanggan();
			$user_id = $db->login_secure($username, $password);

			if ($user_id != -1) {
				$_SESSION["user_id"] = $user_id;
				header("Location: index1.php");
				exit();
			}
			else
				$error = "Wrong username or password!";
		}
	}
?>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="styling.css">
	</head>
	<body>
		<div class="container">
			<div class="login">
		<h1>User Login</h1>
		<?php
			if (isset($error)) {
				echo "<p style = 'color:red'>$error</p>";
			}
		?>
		<form action="login.php" method="post">
			<table>
				<tr>
					<td>Username</td>
					<td><input type="text" name="username"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password"></td>
				</tr>
			</table>
			<input type="submit" name="submit" value="Login">
			<a href = "register.php">Register</a>
		</form>
			</div>
		</div>
	</body>
</html>