<?php
session_start();

// Include file yang berisi kelas User
require_once 'User.php';  // Sesuaikan path jika diperlukan

// Ambil data dari form
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$gender = $_POST['gender'] ?? '';
$subscribe = isset($_POST['subscribe']) ? 'Yes' : 'No';

// Validasi data
if (empty($name) || empty($email) || empty($gender)) {
    echo "Data tidak lengkap!";
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email tidak valid!";
    exit;
}

// Simpan data ke dalam session
$_SESSION['name'] = $name;
$_SESSION['email'] = $email;
$_SESSION['gender'] = $gender;
$_SESSION['subscribe'] = $subscribe;

// Simpan informasi IP dan browser
$user_ip = $_SERVER['REMOTE_ADDR'];
$user_browser = $_SERVER['HTTP_USER_AGENT'];

// Simpan data ke dalam database (asumsi sudah ada koneksi ke database)
include 'db.php';

$user = new User($name, $email, $gender, $subscribe, $conn);
if ($user->saveData()) {
    echo "Data berhasil disimpan.";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);

// Redirect ke halaman utama setelah submit
header("Location: form.php");
exit();
?>
