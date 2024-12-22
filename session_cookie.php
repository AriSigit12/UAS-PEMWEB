<?php
// Menggunakan session
session_start();
$_SESSION['user_name'] = "User";

// Menetapkan cookie
setcookie("user", "John Doe", time() + 3600, "/"); // Cookie diset selama 1 jam

// Mendapatkan cookie
if (isset($_COOKIE["user"])) {
    echo "User cookie: " . $_COOKIE["user"];
} else {
    echo "Cookie 'user' tidak ditemukan.";
}

// Menghapus cookie
setcookie("user", "", time() - 3600, "/"); // Menghapus cookie
?>
