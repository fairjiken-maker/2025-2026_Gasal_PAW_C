<?php
// koneksi.php
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';          // sesuaikan password MySQL Anda
$DB_NAME = 'tpp5'; // ganti dengan nama database Anda

$koneksi = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if (!$koneksi) {
    // hentikan eksekusi dan tampilkan pesan error yang jelas
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// optional: set charset agar tidak ada masalah encoding
mysqli_set_charset($koneksi, "utf8");
