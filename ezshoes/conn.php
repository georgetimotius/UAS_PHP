<?php

$db_host = "localhost";
$db_user = "*****";
$db_pass = "*****";
$db_name = "ezsb7886_ezshoes";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_error()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}