<?php
	class Database {
		protected $db;

		function __construct() {
			$this->db = mysqli_connect(
				"localhost", //host
				"root",		//username
				"",		//password
				"ezshoes" //db name
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