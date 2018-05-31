<?php
	session_start();
	if (!isset($_SESSION["loggedIn"])) {
		header("location: login.php");
		exit();
	}

	require_once("databases/Database.php");
	require_once("databases/Testimoni.php");

	$db = new TestimoniDB();

	if ($_POST) {
		$kode_testi = trim($_POST['kodetesti']);
		if ($db->delete($kode_testi)) {
			header("Location: admin.php");
			exit();
		}
		else
			echo("Gagal menghapus testimoni");
	}

	// jika ?id=<id> di-set pada URL, maka dapatkan informasi buku tersebut
	$testi = isset($_GET['id']) ? $db->select_by_id($_GET['id']) : array();
?>
<html>
	<head>
		<title>Delete Testimoni</title>
		<link rel="stylesheet" href="styleadmin.css">
	</head>
	<body>
		<div class="container">
			<div class="login">
		<h1>Delete Testimoni</h1>
		<form method="post" action="trans_delete.php">
			<input type="hidden" name="kodetesti" value="<?php echo $testi['id_testimoni']; ?>">
			<table>
				<tr>
					<td>Testimoni</td>
					<td>
						<input type="text" name="testimoni" value="<?php echo $testi['testimoni']; ?>" readonly>
					</td>
				</tr>
			</table>
			<input type="submit" name="submit" value="Delete">
			<a href="admin.php">Cancel</a>
		</form>
	</body>
</html>