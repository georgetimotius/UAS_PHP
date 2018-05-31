<?php
	session_start();
	if (!isset($_SESSION["loggedIn"])) {
		header("Location: login.php");
		exit();
	}

	require_once("databases/Database.php");
	require_once("databases/Barang.php");

	$db = new BarangDB();

	if ($_POST) {
		$nama_brg = trim($_POST['namabrg']);
		$harga = trim($_POST['harga']);
		$stok = trim($_POST['stok']);
		$gambar = trim($_POST['gambar']);
		$kode_brg = trim($_POST['kodebrg']);

		if ($db->update($nama_brg, $harga, $stok, $gambar, $kode_brg)) {
			header("Location: admin.php");
			exit();
		}
		else
			echo("Gagal update barang");
	}

	// jika ?id=<id> di-set pada URL, maka dapatkan informasi buku tersebut
	$barang = isset($_GET['id']) ? $db->select_by_id($_GET['id']) : array();
?>
<html>
	<head>
		<title>Update Item</title>
		<link rel="stylesheet" href="styleadmin.css">
	</head>
	<body>
		<div class="container">
			<div class="login">
		<h1>Update Item</h1>
		<form method="post" action="barang_update.php">
			<input type="hidden" name="kodebrg" value="<?php echo $barang['kode_brg']; ?>">
			<table>
				<tr>
					<td>Nama Barang</td>
					<td>
						<input type="text" name="namabrg" value="<?php echo $barang['nama_brg']; ?>">
					</td>
				</tr>
				<tr>
					<td>Harga</td>
					<td>
						<input type="number" name="harga" value="<?php echo $barang['harga']; ?>">
					</td>
				</tr>
				<tr>
					<td>Stok</td>
					<td>
						<input type="number" name="stok" value="<?php echo $barang['stok']; ?>">
					</td>
				</tr>
				<tr>
					<td>Gambar</td>
					<td>
						<input type="text" name="gambar" value="<?php echo $barang['gambar']; ?>">
					</td>
				</tr>
			</table>
			<input type="submit" name="submit" value="Save">
			<a href="admin.php">Cancel</a>
		</form>
	</body>
</html>