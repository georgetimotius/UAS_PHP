<?php
	session_start();
	if (!isset($_SESSION["loggedIn"])) {
		header("Location: login.php");
		exit();
	}
?>
<html>
	<head>
		<title>Admin Page</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	</head>
	<body>
		<h1><center>Detail Barang</center></h1>
		<p>     </p>
		<p>     </p>
		<p>     </p>
		<?php
			require_once("databases/Database.php");
			require_once("databases/Barang.php");

			$db = new BarangDB();
			$barangs = $db->select_all();
		?>
		<table class="table table-dark">
			<tr>
				<th>Nama Barang</th>
				<th>Harga</th>
				<th>Stok</th>
				<th>Actions</th>
			</tr>
			<?php
				foreach ($barangs as $barang) {
					echo "<tr>";
					echo "<td>" . $barang["nama_brg"] . "</td>";
					echo "<td>" . $barang["harga"] . "</td>";
					echo "<td>" . $barang["stok"] . "</td>";
					echo "<td>";
					echo "<a href='barang_update.php?id=" . $barang['kode_brg'] . "'>Update</a> ";
					echo "<a href='barang_delete.php?id=" . $barang['kode_brg'] . "'>Delete</a> ";
					echo "</td>";
					echo "</tr>";
				}
			?>
		</table>
		<center><a href="barang_add.php" class="btn btn-lg btn-success">Tambah Barang</a></center>
		<p>     </p>
		<p>     </p>
		<p>     </p>
		<?php
			require_once("databases/Database.php");
			require_once("databases/Transaksi.php");

			$db = new TransaksiDB();
			$transs = $db->select_all();
		?>
		<h2><center>Detail Transaksi</center></h2>
		<table class="table table-dark">
			<tr>
				<th>Kode Transaksi</th>
				<th>Kode Barang</th>
				<th>Username</th>
				<th>Quantity</th>
				<th>Total</th>
				<th>Tanggal Transaksi</th>
				<th>Nama Pelanggan</th>
				<th>No Telp</th>
				<th>Alamat</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
			<?php
				foreach ($transs as $trans) {
					echo "<tr>";
					echo "<td>" . $trans["kode_trans"] . "</td>";
					echo "<td>" . $trans["kode_brg"] . "</td>";
					echo "<td>" . $trans["username"] . "</td>";
					echo "<td>" . $trans["quantity"] . "</td>";
					echo "<td>" . $trans["total_hrg"] . "</td>";
					echo "<td>" . $trans["tgl_trans"] . "</td>";
					echo "<td>" . $trans["nama_pelanggan"] . "</td>";
					echo "<td>" . $trans["no_telp"] . "</td>";
					echo "<td>" . $trans["alamat"] . "</td>";
					echo "<td>" . $trans["email"] . "</td>";
					echo "<td>";
					echo "<a href='trans_delete.php?id=" . $trans['kode_trans'] . "'>Delete</a> ";
					echo "</td>";
					echo "</tr>";
				}
			?>
		</table>
		<h1><center>Rekening Customer</center></h1>
		<p>     </p>
		<p>     </p>
		<p>     </p>
		<?php
			require_once("databases/Database.php");
			require_once("databases/Rekening.php");

			$db = new RekeningDB();
			$reks = $db->select_all();
		?>
		<table class="table table-dark">
			<tr>
				<th>Username</th>
				<th>Bank</th>
				<th>No. Rekening</th>
				<th>Rekening a/n</th>
			</tr>
			<?php
				foreach ($reks as $rek) {
					echo "<tr>";
					echo "<td>" . $rek["username"] . "</td>";
					echo "<td>" . $rek["bank"] . "</td>";
					echo "<td>" . $rek["no_rek"] . "</td>";
					echo "<td>" . $rek["nama_rek"] . "</td>";
					echo "</tr>";
				}
			?>
		</table>
				<h1><center>Testimoni</center></h1>
		<p>     </p>
		<p>     </p>
		<p>     </p>
		<?php
			require_once("databases/Database.php");
			require_once("databases/Testimoni.php");

			$db = new TestimoniDB();
			$testii = $db->select_all();
		?>
		<table class="table table-dark">
			<tr>
				<th>Nama</th>
				<th>Email</th>
				<th>Testimoni</th>
				<th>Action</th>
			</tr>
			<?php
				foreach ($testii as $testi) {
					echo "<tr>";
					echo "<td>" . $testi["nama"] . "</td>";
					echo "<td>" . $testi["email"] . "</td>";
					echo "<td>" . $testi["testimoni"] . "</td>";
					echo "<td>";
					echo "<a href='testi_delete.php?id=" . $testi['id_testimoni'] . "'>Delete</a> ";
					echo "</td>";
					echo "</tr>";
				}
			?>
		</table>
		<center><a href="logout.php" class="btn btn-lg btn-danger">Logout</a></center>
	</body>
</html>
