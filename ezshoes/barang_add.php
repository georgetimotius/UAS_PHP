<?php
	session_start();
	if (!isset($_SESSION["loggedIn"])) {
		header("Location: login.php");
		exit();
	}
	if ($_POST) {
		$nama_brg = trim($_POST['namabrg']);
		$harga = trim($_POST['harga']);
		$stok = trim($_POST['stok']);
		$gambar = trim($_POST['gambar']);

		require_once("databases/Database.php");
		require_once("databases/Barang.php");

		$db = new BarangDB();
		if ($db->insert($nama_brg, $harga, $stok, $gambar)) {
			header("Location: admin.php");
			exit();
		}
		else
			echo("Gagal menambahkan barang");
	}
?>
<html>
	<head>
		<title>Add New Item</title>
		<link rel="stylesheet" href="styleadmin.css">
	</head>
	<body>
		<div class="container">
			<div class="login">
		<h1>Add New Item</h1>
		<form method="post" action="barang_add.php">
			<table>
				<tr>
					<td>Nama Barang</td>
					<td>
						<input type="text" name="namabrg">
					</td>
				</tr>
				<tr>
					<td>Harga</td>
					<td>
						<input type="number" name="harga">
					</td>
				</tr>
				<tr>
					<td>Stok</td>
					<td>
						<input type="number" name="stok">
					</td>
				</tr>
				<tr>
					<td>Gambar</td>
					<td>
						<input type="text" name="gambar">
					</td>
				</tr>
			</table>
			<input type="submit" name="submit" value="Save">
			<a href="admin.php">Cancel</a>
		</form>
	</body>
</html>