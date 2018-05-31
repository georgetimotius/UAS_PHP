<?php
class TransaksiDB extends Database {
	private $table = "transaksi";

	public function select_all() {
		$query = "SELECT * FROM $this->table";
		$retval = array();

		$result = $this->db->query($query);
		while ($row = mysqli_fetch_array($result)) {
			array_push($retval, $row);
		}

		return $retval;
	}

	public function insert($kodebrg, $username, $kuantitas, $harga, $nama, $notelp, $alamat, $email)
		{
			$query = "INSERT INTO $this->table
			(kode_brg, username, quantity, total_hrg, nama_pelanggan, no_telp, alamat, email)
			VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
			$stmt = $this->db->prepare($query);
			$stmt->bind_param(
				"isiissss",
				$kodebrg,
				$username,
				$kuantitas,
				$harga,
				$nama,
				$notelp,
				$alamat,
				$email
			);
			return $stmt->execute();
		}

	public function select_by_id($id) {
			$query = "SELECT * FROM $this->table WHERE kode_trans = ?";
			$stmt = $this->db->prepare($query);
			$stmt->bind_param("i", $id);
			$result = $stmt->execute();
			$result = $stmt->get_result();
			return mysqli_fetch_array($result);
		}

	public function delete($kode_trans) {
		$query = "DELETE FROM $this->table WHERE kode_trans = ?";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param("i", $kode_trans);
		return $stmt->execute();
		}
	}
?>