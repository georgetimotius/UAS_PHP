<?php
	session_start();
	if (!isset($_SESSION["loggedIn"])) {
		header("location: login.php");
		exit();
	}

	require_once("databases/Database.php");
	require_once("databases/Barang.php");

	$db = new BarangDB();

	if ($_POST) {
		$kode_brg = trim($_POST['kodebrg']);
		if ($db->delete($kode_brg)) {
			header("Location: admin.php");
			exit();
		}
		else
			echo("Gagal menghapus buku");
	}

	// jika ?id=<id> di-set pada URL, maka dapatkan informasi buku tersebut
	$barang = isset($_GET['id']) ? $db->select_by_id($_GET['id']) : array();
?>
<html>
	<head>
		<title>Delete Item</title>
		<link rel="stylesheet" href="styleadmin.css">
	</head>
	<body>
		<div class="container">
			<div class="login">
		<h1>Delete Item</h1>
		<form method="post" action="barang_delete.php">
			<input type="hidden" name="kodebrg" value="<?php echo $barang['kode_brg']; ?>">
			<table>
				<tr>
					<td>Nama Barang</td>
					<td>
						<input type="text" name="namabrg" value="<?php echo $barang['nama_brg']; ?>" readonly>
					</td>
				</tr>
				<tr>
					<td>Harga</td>
					<td>
						<input type="number" name="harga" value="<?php echo $barang['harga']; ?>" readonly>
					</td>
				</tr>
				<tr>
					<td>Stok</td>
					<td>
						<input type="number" name="stok" value="<?php echo $barang['stok']; ?>" readonly>
					</td>
				</tr>
				<tr>
					<td>Gambar</td>
					<td>
						<input type="text" name="gambar" value="<?php echo $barang['gambar']; ?>" readonly>
					</td>
				</tr>
			</table>
			<input type="submit" name="submit" value="Delete">
			<a href="admin.php">Cancel</a>
		</form>
	</body>
</html>