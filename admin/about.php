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
  <meta charset="UTF-8" />
  <title>Dashboard Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
    }
  </script>
  <style>
    .toggle-wrapper input:checked ~ .slider {
      background-color: #f9a8d4;
    }
    .toggle-wrapper input:checked ~ .slider .dot {
      background-color: #f472b6;
      transform: translateX(100%);
    }
    .slider, .dot {
      transition: all 0.3s ease;
    }
    .icon-sun, .icon-moon {
      transition: all 0.3s ease;
    }
    .icon-sun {
      opacity: 1;
      transform: scale(1);
    }
    .icon-moon {
      opacity: 0;
      transform: scale(0.5);
    }
    .toggle-wrapper input:checked ~ .slider .icon-sun {
      opacity: 0;
      transform: scale(0.5);
    }
    .toggle-wrapper input:checked ~ .slider .icon-moon {
      opacity: 1;
      transform: scale(1);
    }
  </style>
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
<header class="bg-pink-800 dark:bg-gray-900 text-white text-center py-6 shadow-md">
  <h1 class="text-3xl font-bold tracking-wide text-white dark:text-pink-400">Kelola Halaman About</h1>
</header>

<!-- Konten -->
<div class="flex max-w-7xl mx-auto mt-8 px-4 gap-6">
  <!-- Sidebar -->
  <aside class="w-1/4 bg-pink-100 dark:bg-gray-800 border  border-pink-500 dark:border-pink-500 rounded shadow p-6">
    <h2 class="text-xl font-semibold text-pink-800 dark:text-pink-300 mb-6 text-center">MENU</h2>
    <ul class="space-y-3 text-gray-700 dark:text-gray-100 text-base">
      <li><a href="beranda_admin.php" class="flex items-center gap-2 hover:text-pink-600 dark:hover:text-pink-300 transition">🏠 Beranda</a></li>
      <li><a href="data_artikel.php" class="flex items-center gap-2 hover:text-pink-600 dark:hover:text-pink-300 transition">📝 Kelola Artikel</a></li>
      <li><a href="data_gallery.php" class="flex items-center gap-2 hover:text-pink-600 dark:hover:text-pink-300 transition">🖼 Kelola Gallery</a></li>
      <li><a href="about.php" class="flex items-center gap-2 font-semibold text-pink-900 dark:text-pink-400 bg-pink-200 dark:bg-pink-900 rounded px-2 py-1">ℹ️ About</a></li>
      <li><a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');" class="flex items-center gap-2 text-red-600 dark:text-red-400 hover:underline">🚪 Logout</a></li>
    </ul>
  </aside>

  <!-- Main Content -->
  <main class="w-3/4 bg-white dark:bg-gray-800 rounded shadow p-6">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-xl font-bold text-pink-600 dark:text-pink-300">Tentang Saya</h2>
      <a href="add_about.php" class="bg-gradient-to-r from-pink-500 to-pink-700 text-white px-4 py-2 rounded-lg shadow hover:scale-105 transition">+ Tambah Data</a>
    </div>

    <!-- Notifikasi -->
    <?php if (isset($_GET['msg']) && $_GET['msg'] == 'sukses'): ?>
      <div class="bg-pink-500 text-white px-4 py-2 rounded mb-4 animate-bounce">Data berhasil disimpan!</div>
    <?php endif; ?>

    <!-- Pencarian -->
    <form method="GET" class="mb-4 flex gap-2 items-center">
      <input
        type="text"
        name="q"
        placeholder="Cari konten..."
        class="flex-1 px-4 py-2 border border-pink-400 rounded focus:outline-none focus:ring-2 focus:ring-pink-500 dark:bg-gray-900 dark:border-pink-500 dark:text-white"
        value="<?php echo isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>"
      />
      <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded">Cari</button>

      <?php if (!empty($_GET['q'])): ?>
        <a href="about.php" class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded cursor-pointer select-none">Reset</a>
      <?php endif; ?>
    </form>

    <!-- List About -->
    <div class="space-y-4">
      <?php
      $q = isset($_GET['q']) ? mysqli_real_escape_string($db, $_GET['q']) : '';
      $sql = "SELECT * FROM tbl_about WHERE about LIKE '%$q%' ORDER BY id_about DESC";
      $query = mysqli_query($db, $sql);
      if (mysqli_num_rows($query) === 0) {
        echo "<p class='text-center text-gray-500 dark:text-gray-400'>Tidak ada data ditemukan.</p>";
      }
      while ($data = mysqli_fetch_array($query)) {
          echo "<div class='p-4 bg-pink-50 dark:bg-gray-700 border border-pink-200 dark:border-pink-500 rounded shadow hover:shadow-lg hover:scale-[1.02] transition'>";
          if (!empty($data['foto'])) {
              echo "<img src='../uploads/{$data['foto']}' alt='Foto' class='w-20 h-20 object-cover rounded-full mb-3'>";
          }
          echo "<p class='mb-3'>" . nl2br(htmlspecialchars($data['about'])) . "</p>";
          echo "<div class='flex space-x-4 text-sm'>";
          echo "<a href='edit_about.php?id_about={$data['id_about']}' class='text-pink-600 dark:text-pink-400 hover:underline'>Edit</a>";
          echo "<a href='delete_about.php?id_about={$data['id_about']}' onclick='return confirm(\"Yakin ingin menghapus?\")' class='text-red-600 dark:text-red-400 hover:underline'>Hapus</a>";
          echo "</div></div>";
      }
      ?>
    </div>
  </main>
</div>

<!-- ✅ FIXED Footer -->
<footer class="bg-pink-800 dark:bg-gray-900 text-white dark:text-pink-400 text-center py-4 mt-10">
  &copy; <?php echo date('Y'); ?> | Created by Dewi Rahma
</footer>

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

</body>
</html>
