<?php
	if ($_POST) {
		$username = trim($_POST["username"]);
		$password = trim($_POST["password"]);
		$nama_pelanggan = trim($_POST["nama_pelanggan"]);

		// validasi input
		$errors = array();
		if (strlen($username) == 0) {
			array_push($errors, "Username tidak boleh kosong");
		}
		if (strlen($password) == 0) {
			array_push($errors, "Password harus diisi");
		}
		if (strlen($nama_pelanggan) == 0) {
			array_push($errors, "Nama lengkap harus diisi");
		}

		if (count($errors) == 0) {
			// insert ke database jika tidak ada error
			require_once("databases/Database.php");
			require_once("databases/Pelanggan.php");

			$db = new Pelanggan();
			if ($db->insert($username, $password, $nama_pelanggan)) {
				header("Location: login.php");
				exit();
			}
			else {
				array_push($errors, "Gagal registrasi");
			}
		}
	}
?>
<html>
	<head>
		<title>Register new account</title>
		<link rel="stylesheet" href="styling.css">
	</head>
	<body>
		<div class="container">
			<div class="login">
		<h1>Register</h1>
		<?php if ($_POST && (count($errors) > 0)) { ?>
		<p style="color:red">
			<strong>Errors:</strong>
			<ul>
			<?php foreach ($errors as $error) { ?>
				<li><?php echo $error; ?></li>
			<?php } ?>
			</ul>
		</p>
		<?php } ?>
		<form action="register.php" method="post">
			<table>
				<tr>
					<td>Username</td>
					<td>
						<input type="text" name="username">
					</td>
				</tr>
				<tr>
					<td>Password</td>
					<td>
						<input type="password" name="password">
					</td>
				</tr>
				<tr>
					<td>Nama Pelanggan</td>
					<td>
						<input type="text" name="nama_pelanggan">
					</td>
				</tr>
			</table>
			<input type="submit" name="submit" value="Register">
		</form>
	</body>
</html>