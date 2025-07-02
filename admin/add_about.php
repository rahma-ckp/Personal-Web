<?php 
include('../koneksi.php'); 
session_start(); 
if (!isset($_SESSION['username'])) { 
  header('location:login.php'); 
  exit; 
} 
?> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
  <meta charset="UTF-8"> 
  <title>Tambah About</title> 
  <script src="https://cdn.tailwindcss.com"></script> 
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            pinklight: '#fce7f3',
            pinkdark: '#be185d',
          }
        }
      }
    }
  </script>
</head> 
<body class="bg-pinklight min-h-screen text-gray-800"> 

  <!-- Header --> 
  <header class="bg-pinkdark text-white text-center py-6 shadow"> 
    <h1 class="text-3xl font-bold">Tambah Data About</h1> 
  </header> 

  <div class="flex max-w-7xl mx-auto mt-8 px-4"> 

    <!-- Sidebar --> 
    <aside class="w-1/4 bg-white rounded shadow p-4"> 
      <h2 class="text-xl font-semibold text-pinkdark mb-4 text-center">MENU</h2> 
      <ul class="space-y-2 text-gray-700"> 
        <li><a href="beranda_admin.php" class="block hover:text-pinkdark">Beranda</a></li>
        <li><a href="data_artikel.php" class="block hover:text-pinkdark">Kelola Artikel</a></li> 
        <li><a href="data_gallery.php" class="block hover:text-pinkdark">Kelola Gallery</a></li> 
        <li><a href="about.php" class="block font-semibold text-pinkdark">About</a></li> 
        <li>
          <a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');"
             class="block text-red-600 hover:underline font-medium">Logout</a> 
        </li> 
      </ul> 
    </aside> 

    <!-- Main Content --> 
    <main class="w-3/4 bg-white rounded shadow p-6 ml-6"> 
      <form action="proses_add_about.php" method="post" class="space-y-6"> 
        <div> 
          <label for="about" class="block text-sm font-medium text-gray-700 mb-1">About</label> 
          <textarea id="about" name="about" rows="5" required 
            class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-pinkdark"></textarea> 
        </div> 
        <div class="flex justify-end space-x-4"> 
          <button type="submit" 
            class="bg-pinkdark text-white px-4 py-2 rounded hover:bg-pink-700 transition">Simpan</button> 
          <a href="about.php" 
            class="bg-pinklight text-gray-700 px-4 py-2 rounded hover:bg-pink-200 transition">Batal</a> 
        </div> 
      </form> 
    </main> 
  </div> 

  <!-- Footer --> 
  <footer class="bg-pinkdark text-white text-center py-4 mt-10"> 
    &copy; <?php echo date('Y'); ?> | Created by Dewi Rahma 
  </footer> 

</body> 
</html>
