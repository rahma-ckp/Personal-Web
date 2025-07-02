<?php 
include('../koneksi.php'); 
session_start(); 
if (!isset($_SESSION['username'])) { 
  header('location:login.php'); 
  exit; 
} 

$id = $_GET['id_artikel']; 
$sql = "SELECT * FROM tbl_artikel WHERE id_artikel = '$id'"; 
$query = mysqli_query($db, $sql); 
$data = mysqli_fetch_array($query); 
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Artikel</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

<!-- Header -->
<header class="bg-pink-600 text-white text-center py-6 shadow">
  <h1 class="text-3xl font-bold">Edit Artikel</h1>
</header>

<div class="flex max-w-7xl mx-auto mt-8 px-4">
  <!-- Sidebar -->
  <aside class="w-1/4 bg-white rounded shadow p-4">
    <h2 class="text-xl font-semibold text-pink-600 mb-4 text-center">MENU</h2>
    <ul class="space-y-2 text-gray-700">
      <li><a href="beranda_admin.php" class="block hover:text-pink-500">Beranda</a></li>
      <li><a href="data_artikel.php" class="block font-semibold text-pink-700">Kelola Artikel</a></li>
      <li><a href="data_gallery.php" class="block hover:text-pink-500">Kelola Gallery</a></li>
      <li><a href="about.php" class="block hover:text-pink-500">About</a></li>
      <li>
        <a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');"
           class="block text-red-600 hover:underline font-medium">Logout</a>
      </li>
    </ul>
  </aside>

  <!-- Main Content -->
  <main class="w-3/4 bg-white rounded shadow p-6 ml-6">
    <form action="proses_edit_artikel.php" method="post" enctype="multipart/form-data" class="space-y-6">
      <input type="hidden" name="id_artikel" value="<?php echo $data['id_artikel']; ?>">

      <div>
        <label for="nama_artikel" class="block text-sm font-medium text-gray-700 mb-1">Judul Artikel</label>
        <input type="text" id="nama_artikel" name="nama_artikel" required
          value="<?php echo htmlspecialchars($data['nama_artikel']); ?>"
          class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-pink-500">
      </div>

      <div>
        <label for="isi_artikel" class="block text-sm font-medium text-gray-700 mb-1">Isi Artikel</label>
        <textarea id="isi_artikel" name="isi_artikel" rows="5" required
          class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-pink-500"><?php echo htmlspecialchars($data['isi_artikel']); ?></textarea>
      </div>

      <div>
        <label for="gambar" class="block text-sm font-medium text-gray-700 mb-1">Gambar (Opsional)</label>
        <input type="file" id="gambar" name="gambar" accept="image/*"
          class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-pink-500">
        
        <?php if (!empty($data['gambar'])): ?>
          <p class="mt-2 text-sm text-gray-600">Gambar saat ini: <strong><?php echo $data['gambar']; ?></strong></p>
          <img src="../images/<?php echo $data['gambar']; ?>" alt="Gambar Artikel" class="w-32 mt-2 rounded">
        <?php endif; ?>
      </div>

      <div class="flex justify-end space-x-4">
        <button type="submit"
          class="bg-pink-600 text-white px-4 py-2 rounded hover:bg-pink-700 transition">Update</button>
        <a href="data_artikel.php"
          class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 transition">Batal</a>
      </div>
    </form>
  </main>
</div>

<!-- Footer -->
<footer class="bg-pink-700 text-white text-center py-4 mt-10">
  &copy; <?php echo date('Y'); ?> | Created by Dewi Rahma
</footer>
</body>
</html>
