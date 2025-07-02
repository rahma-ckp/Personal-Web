<?php
include('../koneksi.php');
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}

$id = $_POST['id_artikel'];
$judul = mysqli_real_escape_string($db, $_POST['nama_artikel']);
$isi = mysqli_real_escape_string($db, $_POST['isi_artikel']);

$gambar_baru = '';
if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
    $nama_file = $_FILES['gambar']['name'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
    $folder = '../images/';

    $ext = pathinfo($nama_file, PATHINFO_EXTENSION);
    $gambar_baru = 'artikel_' . time() . '.' . $ext;

    if (!move_uploaded_file($tmp_file, $folder . $gambar_baru)) {
        echo "<script>alert('Gagal upload gambar'); history.back();</script>";
        exit;
    }
}

if (!empty($gambar_baru)) {
    $sql = "UPDATE tbl_artikel SET nama_artikel = '$judul', isi_artikel = '$isi', gambar = '$gambar_baru' WHERE id_artikel = '$id'";
} else {
    $sql = "UPDATE tbl_artikel SET nama_artikel = '$judul', isi_artikel = '$isi' WHERE id_artikel = '$id'";
}

$query = mysqli_query($db, $sql);

if ($query) {
    echo "<script>alert('Artikel berhasil diperbarui.'); window.location='data_artikel.php';</script>";
} else {
    echo "<script>alert('Gagal mengedit artikel.'); history.back();</script>";
}
?>
