<?php
class RekeningDB extends Database {
	private $table = "rekening";

	public function select_all() {
			$query = "SELECT * FROM $this->table";
			$retval = array();

			$result = $this->db->query($query);
			while ($row = mysqli_fetch_array($result)) {
				array_push($retval, $row);
			}

			return $retval;
		}

	public function insert($username, $bank, $norek, $namarek)
		{
			$query = "INSERT INTO $this->table
			(username, bank, no_rek, nama_rek)
			VALUES (?, ?, ?, ?)";
			$stmt = $this->db->prepare($query);
			$stmt->bind_param(
				"ssss",
				$username,
				$bank,
				$norek,
				$namarek
			);
			return $stmt->execute();
		}
	}
?>