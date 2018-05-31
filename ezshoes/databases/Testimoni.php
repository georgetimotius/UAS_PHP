<?php
class TestimoniDB extends Database {
	private $table = "testimoni";

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
		$query = "SELECT * FROM $this->table WHERE id_testimoni = ?";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param("i", $id);
		$result = $stmt->execute();
		$result = $stmt->get_result();
		return mysqli_fetch_array($result);
	}

	public function insert($nama, $email, $testimoni)
		{
			$query = "INSERT INTO $this->table
			(nama, email, testimoni)
			VALUES (?, ?, ?)";
			$stmt = $this->db->prepare($query);
			$stmt->bind_param(
				"sss",
				$nama,
				$email,
				$testimoni
			);
			return $stmt->execute();
		}
	}
?>