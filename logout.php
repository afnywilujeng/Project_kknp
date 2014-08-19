<?php

header("location:index.php");
// Inisialisasi data session

session_start();

// Set session jika belum ada

if (isset($_SESSION['username'])) {

// Hapus session test

unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['dbname']);
unset($_SESSION['host']);
unset($_SESSION['port']);


echo 'session dihapus';

} else {

echo 'unset';

// Mencetak semua elemen session

print_r($_SESSION);

}

?> 