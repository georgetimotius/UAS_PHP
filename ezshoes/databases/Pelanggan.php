<?php
class Pelanggan extends Database {
	private $table = "pelanggan";

	public function insert($username, $password, $nama_pelanggan) {
		$password = password_hash($password, PASSWORD_DEFAULT);
		$query = "INSERT INTO 
				  $this->table(username, password, nama_pelanggan)
				  VALUES(?, ?, ?)";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param("sss", $username, $password, $nama_pelanggan);
		return $stmt->execute();
		//if ($result->num_rows == 1) {
			//$row = mysqli_fetch_array($result);
			//return $row["id"];
		//}
		//return -1;
	}
	public function login_secure($username, $password) {
		$query = "SELECT id_pelanggan, password FROM $this->table 
				  WHERE username = ?"; 
		$stmt = $this->db->prepare($query);
		$stmt->bind_param("s", $username);
		$result = $stmt->execute();
		$result = $stmt->get_result();
		//$result = $this->db->query($query);
		if ($result->num_rows == 1) {
			$row = mysqli_fetch_array($result);
			if (password_verify($password, $row['password'])) {
				return $row["id_pelanggan"];
			}
			else
				return -1;
		}	
		return -1;
	}	
}
?>
