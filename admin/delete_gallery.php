<?php
include('../koneksi.php');
session_start();

if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}

if (!isset($_GET['id_gallery']) || empty($_GET['id_gallery'])) {
    echo "<script>alert('ID gallery tidak valid.'); history.back();</script>";
    exit;
}

$id = intval($_GET['id_gallery']); // Pastikan hanya angka

// Ambil nama file gambar
$sql = "SELECT foto FROM tbl_gallery WHERE id_gallery = $id";
$query = mysqli_query($db, $sql);
$data = mysqli_fetch_array($query);

if ($data) {
    $foto = $data['foto'];
    // Hapus file gambar dari folder
    if (!empty($foto) && file_exists("../images/$foto")) {
        unlink("../images/$foto");
    }

    // Hapus data dari database
    $sql_delete = "DELETE FROM tbl_gallery WHERE id_gallery = $id";
    $query_delete = mysqli_query($db, $sql_delete);

    if ($query_delete) {
        echo "<script>alert('Data gallery berhasil dihapus.'); window.location='data_gallery.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data.'); history.back();</script>";
    }
} else {
    echo "<script>alert('Data tidak ditemukan.'); history.back();</script>";
}
?>
