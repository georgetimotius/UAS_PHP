<?php
	session_start();
	if (!isset($_SESSION["loggedIn"])) {
		header("location: login.php");
		exit();
	}

	require_once("databases/Database.php");
	require_once("databases/Transaksi.php");

	$db = new TransaksiDB();

	if ($_POST) {
		$kode_trans = trim($_POST['kodetrans']);
		if ($db->delete($kode_trans)) {
			header("Location: admin.php");
			exit();
		}
		else
			echo("Gagal menghapus transaksi");
	}

	// jika ?id=<id> di-set pada URL, maka dapatkan informasi buku tersebut
	$trans = isset($_GET['id']) ? $db->select_by_id($_GET['id']) : array();
?>
<html>
	<head>
		<title>Delete Transaction</title>
		<link rel="stylesheet" href="styleadmin.css">
	</head>
	<body>
		<div class="container">
			<div class="login">
		<h1>Delete Transaction</h1>
		<form method="post" action="trans_delete.php">
			<input type="hidden" name="kodetrans" value="<?php echo $trans['kode_trans']; ?>">
			<table>
				<tr>
					<td>Tanggal Transaksi</td>
					<td>
						<input type="text" name="date" value="<?php echo $trans['tgl_trans']; ?>" readonly>
					</td>
				</tr>
				<tr>
					<td>Total</td>
					<td>
						<input type="number" name="totalhrg" value="<?php echo $trans['total_hrg']; ?>" readonly>
					</td>
				</tr>
				<?php echo("Apakah anda yakin transaksi ini telah selesai ?"); ?>
			</table>
			<input type="submit" name="submit" value="Delete">
			<a href="admin.php">Cancel</a>
		</form>
	</body>
</html>