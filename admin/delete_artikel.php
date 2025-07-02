<?php
include('../koneksi.php');
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}

// Validasi id_artikel
if (!isset($_GET['id_artikel']) || !is_numeric($_GET['id_artikel'])) {
    echo "<script>alert('ID artikel tidak valid.');
    history.back();</script>";
    exit;
}

$id = intval($_GET['id_artikel']); // Konversi ke integer untuk keamanan

// Query DELETE dengan LIMIT 1 agar hanya 1 data yang dihapus
$sql = "DELETE FROM tbl_artikel WHERE id_artikel = $id LIMIT 1";
$query = mysqli_query($db, $sql);

// Cek hasil query
if ($query && mysqli_affected_rows($db) > 0) {
    echo "<script>alert('Artikel berhasil dihapus.');
    window.location='data_artikel.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus artikel atau artikel tidak ditemukan.');
    history.back();</script>";
}
?>
