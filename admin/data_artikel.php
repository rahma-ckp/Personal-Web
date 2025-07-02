<?php
include('../koneksi.php');
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
    }
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const html = document.documentElement;
      const toggle = document.getElementById('darkToggle');
      const audio = new Audio('https://cdn.pixabay.com/download/audio/2022/03/15/audio_c7f243d92c.mp3?filename=click-124467.mp3');

      if (localStorage.getItem('theme') === 'dark') {
        html.classList.add('dark');
        toggle.checked = true;
      }

      toggle.addEventListener('change', () => {
        const isDark = toggle.checked;
        html.classList.toggle('dark', isDark);
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
        audio.play();
      });
    });
  </script>
</head>
<body class="bg-pink-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 min-h-screen transition duration-300">

  <!-- Toggle Dark Mode -->
  <div class="fixed top-4 right-4 z-50">
    <label class="relative inline-flex items-center cursor-pointer">
      <input id="darkToggle" type="checkbox" class="sr-only peer" />
      <div class="w-14 h-8 bg-pink-300 dark:bg-pink-700 rounded-full transition duration-300"></div>
      <div class="absolute top-1 left-1 w-6 h-6 bg-white rounded-full shadow-md transition-transform duration-300 peer-checked:translate-x-6"></div>
      <svg class="absolute left-2 top-2 w-4 h-4 text-yellow-400 dark:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 3v1m0 16v1m8.485-8.485h1M3.515 12.515h1M16.95 7.05l.707-.707M5.636 18.364l.707-.707M16.95 16.95l.707.707M5.636 5.636l.707.707M12 8a4 4 0 100 8 4 4 0 000-8z" />
      </svg>
      <svg class="absolute right-2 top-2 w-4 h-4 text-pink-100 hidden dark:block" fill="currentColor" viewBox="0 0 24 24">
        <path d="M21 12.79A9 9 0 1111.21 3a7 7 0 109.79 9.79z"/>
      </svg>
    </label>
  </div>

  <!-- Header -->
  <header class="bg-pink-800 dark:bg-gray-800 text-white text-center py-6 shadow-md">
    <h1 class="text-3xl font-bold tracking-wide text-white dark:text-pink-400">Kelola Halaman Artikel</h1>
  </header>

  <!-- Layout -->
  <div class="flex max-w-7xl mx-auto mt-8 px-4 gap-6">
    <!-- Sidebar -->
    <aside class="w-1/4 bg-pink-100 dark:bg-gray-800 border dark:border-pink-400 rounded shadow p-6  border-pink-400">
      <h2 class="text-xl font-semibold text-pink-800 dark:text-pink-300 mb-6 text-center">MENU</h2>
      <ul class="space-y-3 text-gray-700 dark:text-gray-100 text-base">
        <li><a href="beranda_admin.php" class="flex items-center gap-2 hover:text-pink-600 dark:hover:text-pink-300 transition">🏠 Beranda</a></li>
        <li><a href="data_artikel.php" class="flex items-center gap-2 font-semibold text-pink-900 dark:text-pink-400 bg-pink-200 dark:bg-gray-700 rounded px-2 py-1">📝 Kelola Artikel</a></li>
        <li><a href="data_gallery.php" class="flex items-center gap-2 hover:text-pink-600 dark:hover:text-pink-300 transition">🖼 Kelola Gallery</a></li>
        <li><a href="about.php" class="flex items-center gap-2 hover:text-pink-600 dark:hover:text-pink-300 transition">ℹ️ About</a></li>
        <li><a href="logout.php" onclick="return confirm('Yakin ingin keluar?');" class="flex items-center gap-2 text-red-600 dark:text-red-400 hover:underline">🚪 Logout</a></li>
      </ul>
    </aside>

    <!-- Main Content -->
    <main class="w-3/4 bg-white dark:bg-gray-800 rounded shadow p-6">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-pink-600 dark:text-pink-300">Daftar Artikel</h2>
        <a href="add_artikel.php" class="bg-gradient-to-r from-pink-500 to-pink-700 text-white px-4 py-2 rounded-lg shadow hover:scale-105 transition">+ Tambah Artikel</a>
      </div>

      <!-- Search Form -->
      <form method="get" class="mb-4 flex gap-2">
        <input 
          type="text" 
          name="q" 
          placeholder="Cari artikel..." 
          value="<?= htmlspecialchars($_GET['q'] ?? '') ?>" 
          class="flex-grow px-4 py-2 border-2 border-pink-400 rounded focus:outline-none focus:ring-2 focus:ring-pink-500 dark:bg-gray-900 dark:border-pink-500"
        />
        <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded transition">Cari</button>
        <a href="data_artikel.php" class="bg-pink-300 hover:bg-pink-400 text-pink-900 px-4 py-2 rounded transition flex items-center justify-center">Reset</a>
      </form>

      <!-- Artikel Grid -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6">
        <?php
        $q = $_GET['q'] ?? '';
        $sql = "SELECT * FROM tbl_artikel WHERE nama_artikel LIKE '%$q%' OR isi_artikel LIKE '%$q%' ORDER BY created_at DESC";
        $query = mysqli_query($db, $sql);
        if (!$query) {
          echo "<p class='text-red-500'>SQL Error: " . mysqli_error($db) . "</p>";
        } elseif (mysqli_num_rows($query) == 0) {
          echo "<p class='text-gray-500 dark:text-gray-300 col-span-full'>Belum ada artikel ditemukan.</p>";
        } else {
          while ($data = mysqli_fetch_array($query)) {
            $preview = strlen(strip_tags($data['isi_artikel'])) > 100 ? substr(strip_tags($data['isi_artikel']), 0, 100) . '...' : strip_tags($data['isi_artikel']);
            echo "
              <div class='p-4 bg-pink-50 dark:bg-gray-700 border border-gray-200 dark:border-pink-500 rounded-xl shadow-md transform transition-all duration-300 ease-in-out hover:shadow-2xl hover:scale-105 hover:-translate-y-1 hover:rotate-[0.3deg]'>
                <h3 class='font-semibold text-lg text-pink-700 dark:text-pink-300 mb-2'>" . htmlspecialchars($data['nama_artikel']) . "</h3>
                <p class='text-sm text-gray-700 dark:text-gray-200'>" . htmlspecialchars($preview) . "</p>
                <small class='block mt-2 text-gray-500 dark:text-gray-400'>Diposting: 24 Juni 2025</small>
                <div class='mt-4 flex justify-end gap-4 text-sm'>
                  <a href='edit_artikel.php?id_artikel={$data['id_artikel']}' class='text-pink-600 dark:text-pink-300 hover:underline'>Edit</a>
                  <a href='delete_artikel.php?id_artikel={$data['id_artikel']}' onclick='return confirm(\"Yakin ingin menghapus?\")' class='text-red-600 dark:text-red-400 hover:underline'>Hapus</a>
                </div>
              </div>";
          }
        }
        ?>
      </div>
    </main>
  </div>

  <!-- Footer -->
  <footer class="bg-pink-800 dark:bg-gray-800 text-white dark:text-pink-400 text-center py-4 mt-10">
    &copy; <?= date('Y'); ?> | Created by Dewi Rahma
  </footer>

</body>
</html>
