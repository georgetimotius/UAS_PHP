<?php
	class Database {
		protected $db;

		function __construct() {
			$this->db = mysqli_connect(
				"localhost", //host
				"ezsb7886",		//username
				"VxYh6K11t6nB29",		//password
				"ezsb7886_ezshoes" //db name
			);
			if(!$this->db) {
				die("ERROR: unable to connect");
			}
		}

		function get_error() {
			return $this->db->error;
		}
	}
?>