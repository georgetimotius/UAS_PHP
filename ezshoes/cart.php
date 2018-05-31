<?php
    require_once("conn.php");
	if (!isset($_SESSION)) {
		session_start();
	}
	$_SESSION['barang'] = $_GET['kode_brg'];
    //$_SESSION['harga'] = $_GET['total'];

	 if (isset($_GET['act']) && isset($_GET['ref'])) {
        $act = $_GET['act'];
        $ref = $_GET['ref'];

        if ($act == "add") {
            if (isset($_GET['kode_brg'])) {
                $kode_brg = $_GET['kode_brg'];
                if (isset($_SESSION['items'][$kode_brg])) {
                    $_SESSION['items'][$kode_brg] += 1;
                } else {
                    $_SESSION['items'][$kode_brg] = 1; 
                }
            }
        } elseif ($act == "plus") {
            if (isset($_GET['kode_brg'])) {
                $kode_brg = $_GET['kode_brg'];
                if (isset($_SESSION['items'][$kode_brg])) {
                    $_SESSION['items'][$kode_brg] += 1;
                }
            }
        } elseif ($act == "min") {
            if (isset($_GET['kode_brg'])) {
                $kode_brg = $_GET['kode_brg'];
                if (isset($_SESSION['items'][$kode_brg])) {
                    $_SESSION['items'][$kode_brg] -= 1;
                }
            }
        } elseif ($act == "del") {
            if (isset($_GET['kode_brg'])) {
                $kode_brg = $_GET['kode_brg'];
                if (isset($_SESSION['items'][$kode_brg])) {
                    unset($_SESSION['items'][$kode_brg]);
                }
            }          
        } elseif ($act == "clear") {
            if (isset($_SESSION['items'])) {
                foreach ($_SESSION['items'] as $key) {
                    unset($_SESSION['items'][$key]);
                }
                unset($_SESSION['items']);
            }
        } 
         
        header ("location:" . $ref);
    }
?>