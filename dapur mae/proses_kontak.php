<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "dapurmae"; // ganti sesuai database

$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    echo "error";
    exit;
}

// Ambil data
$nama    = $_POST['nama'] ?? '';
$email   = $_POST['email'] ?? '';
$no_wa   = $_POST['no_wa'] ?? '';
$pesanan = $_POST['pesanan'] ?? '';
$jumlah  = $_POST['jumlah'] ?? 1;
$catatan = $_POST['catatan'] ?? '';
$pesan   = $_POST['pesan'] ?? '';

// Validasi sederhana
if ($nama == '' || $email == '' || $no_wa == '' || $pesanan == '' || $jumlah < 1) {
    echo "error";
    exit;
}

// Simpan ke database
$sql = "INSERT INTO kontak (nama, email, no_wa, pesanan, jumlah, catatan, pesan) 
        VALUES ('$nama', '$email', '$no_wa', '$pesanan', '$jumlah', '$catatan', '$pesan')";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "error";
}

$conn->close();
?>
