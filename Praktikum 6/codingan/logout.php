<?php
session_start();

$_SESSION = array(); // Hapus semua variabel sesi
session_destroy();  // Hancurkan sesi

header("Location: login.php");
exit;
?>