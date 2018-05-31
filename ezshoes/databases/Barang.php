<?php
	class BarangDB extends Database {
		private $table = "barang";

		public function select_all() {
			$query = "SELECT * FROM $this->table";
			$retval = array();

			$result = $this->db->query($query);
			while ($row = mysqli_fetch_array($result)) {
				array_push($retval, $row);
			}

			return $retval;
		}

		public function select_by_id($id) {
			$query = "SELECT * FROM $this->table WHERE kode_brg = ?";
			$stmt = $this->db->prepare($query);
			$stmt->bind_param("i", $id);
			$result = $stmt->execute();
			$result = $stmt->get_result();
			return mysqli_fetch_array($result);
		}

		public function update($nama_brg, $harga, $stok, $gambar, $kode_brg) {
			$query = "UPDATE $this->table SET nama_brg = ?, harga = ?, stok = ?, gambar = ? WHERE kode_brg = ?";
			$stmt = $this->db->prepare($query);
			$stmt->bind_param(
				"siisi",
				$nama_brg,
				$harga,
				$stok,
				$gambar,
				$kode_brg
			);
			return $stmt->execute();
		}

		public function delete($kode_brg) {
			$query = "DELETE FROM $this->table WHERE kode_brg = ?";
			$stmt = $this->db->prepare($query);
			$stmt->bind_param("i", $kode_brg);
			return $stmt->execute();
		}

		public function insert($nama_brg, $harga, $stok, $gambar)
			{
				$query = "INSERT INTO $this->table
				(nama_brg, harga, stok, gambar)
				VALUES (?, ?, ?, ?)";
				$stmt = $this->db->prepare($query);
				$stmt->bind_param(
					"siis",
					$nama_brg,
					$harga,
					$stok,
					$gambar
				);
				return $stmt->execute();
			}
	}
?>