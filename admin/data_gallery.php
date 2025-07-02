<?php
include('../koneksi.php');
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en" class="transition duration-500">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
    }
  </script>
  <style>
    .toggle-wrapper input:checked ~ .slider .dot {
      transform: translateX(100%);
      background-color: #ec4899;
    }

    .icon-sun, .icon-moon {
      transition: all 0.4s ease;
    }

    .icon-moon {
      opacity: 0;
      transform: scale(0.5);
    }

    .icon-sun {
      opacity: 1;
      transform: scale(1);
    }

    .toggle-wrapper input:checked ~ .slider .icon-moon {
      opacity: 1;
      transform: scale(1);
    }

    .toggle-wrapper input:checked ~ .slider .icon-sun {
      opacity: 0;
      transform: scale(0.5);
    }

    .gallery-card {
      transition: all 0.4s ease;
    }

    .gallery-card:hover {
      transform: scale(1.06) translateY(-5px);
      box-shadow: 0 16px 30px rgba(236, 72, 153, 0.25);
    }

    .glow-hover:hover {
      box-shadow: 0 0 15px rgba(236, 72, 153, 0.5);
    }
  </style>
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
<body class="bg-pink-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 min-h-screen transition duration-500">

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
  <h1 class="text-3xl font-bold tracking-wide dark:text-pink-400 animate-pulse">Kelola Gallery</h1>
</header>

<div class="flex max-w-7xl mx-auto mt-8 px-4 gap-6 transition duration-500">
  <!-- Sidebar -->
  <aside class="w-1/4 bg-pink-100 dark:bg-gray-800 border border-pink-400 dark:border-pink-400 rounded shadow p-6">
    <h2 class="text-xl font-semibold text-pink-800 dark:text-pink-300 mb-6 text-center">MENU</h2>
    <ul class="space-y-3 text-gray-800 dark:text-gray-100 text-base">
      <li><a href="beranda_admin.php" class="flex items-center gap-2 hover:text-pink-600 dark:hover:text-pink-300 transition">🏠 Beranda</a></li>
      <li><a href="data_artikel.php" class="flex items-center gap-2 hover:text-pink-600 dark:hover:text-pink-300 transition">📝 Kelola Artikel</a></li>
      <li><a href="data_gallery.php" class="flex items-center gap-2 font-semibold text-pink-900 dark:text-pink-400 bg-white dark:bg-gray-700 rounded px-2 py-1">🖼 Kelola Gallery</a></li>
      <li><a href="about.php" class="flex items-center gap-2 hover:text-pink-600 dark:hover:text-pink-300 transition">ℹ️ About</a></li>
      <li><a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');" class="flex items-center gap-2 text-red-600 dark:text-red-400 hover:underline">🚪 Logout</a></li>
    </ul>
  </aside>

  <!-- Main -->
  <main class="w-3/4 bg-white dark:bg-gray-800 rounded shadow p-6 ml-6">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-xl font-bold text-pink-600 dark:text-pink-300">Daftar Gallery</h2>
      <a href="add_gallery.php" class="bg-gradient-to-r from-pink-500 to-pink-700 text-white px-4 py-2 rounded-lg hover:scale-105 transition duration-300 shadow-md glow-hover">+ Tambah Gambar</a>
    </div>

    <!-- Filter dan Pencarian -->
    <form method="GET" class="flex flex-wrap gap-4 mb-6 items-center">
      <input type="text" name="cari" placeholder="Cari judul..." value="<?php echo isset($_GET['cari']) ? $_GET['cari'] : '' ?>" class="px-4 py-2 rounded border  border-pink-400 dark:border-pink-400 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400 transition">

      <select name="kategori" onchange="this.form.submit()" class="px-4 py-2 rounded border  border-pink-400 dark:border-pink-400 bg-white dark:bg-gray-700 text-pink-500 dark:text-pink-300 focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400 transition">
        <option value="" class="text-pink-500 dark:text-pink-300">Kategori</option>
        <option value="me" <?php if(isset($_GET['kategori']) && $_GET['kategori'] == 'me') echo 'selected'; ?> class="text-pink-500 dark:text-pink-300">me</option>
        <option value="face" <?php if(isset($_GET['kategori']) && $_GET['kategori'] == 'face') echo 'selected'; ?> class="text-pink-500 dark:text-pink-300">face</option>
        <option value="food" <?php if(isset($_GET['kategori']) && $_GET['kategori'] == 'food') echo 'selected'; ?> class="text-pink-500 dark:text-pink-300">food</option>
        <option value="random" <?php if(isset($_GET['kategori']) && $_GET['kategori'] == 'random') echo 'selected'; ?> class="text-pink-500 dark:text-pink-300">random</option>
      </select>

      <button type="submit" class="bg-pink-600 text-white px-4 py-2 rounded hover:bg-pink-700 transition glow-hover">Cari</button>

      <?php if (isset($_GET['cari']) || isset($_GET['kategori'])): ?>
        <a href="data_gallery.php" class="text-pink-600 hover:underline ml-2">Reset</a>
      <?php endif; ?>
    </form>

    <!-- Gallery -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <?php
      $sql = "SELECT * FROM tbl_gallery";
      $filter = isset($_GET['kategori']) ? $_GET['kategori'] : '';
      $cari = isset($_GET['cari']) ? $_GET['cari'] : '';

      if ($filter || $cari) {
          $sql .= " WHERE ";
          $conditions = [];
          if ($filter) $conditions[] = "judul LIKE '%" . mysqli_real_escape_string($db, $filter) . "%'";
          if ($cari) $conditions[] = "judul LIKE '%" . mysqli_real_escape_string($db, $cari) . "%'";
          $sql .= implode(" AND ", $conditions);
      }

      $query = mysqli_query($db, $sql);
      while ($data = mysqli_fetch_array($query)) {
        echo "<div class='bg-pink-50 dark:bg-gray-700 rounded shadow overflow transition transform gallery-card'>";
        echo "<a href='../images/{$data['foto']}' target='_blank'>";
        echo "<img src='../images/{$data['foto']}' class='w-full h-48 object-cover rounded-t'>";
        echo "</a>";
        echo "<div class='p-4'>";
        echo "<span class='inline-block bg-pink-200 text-pink-800 dark:bg-pink-900 dark:text-pink-300 text-xs px-2 py-1 rounded mb-2'>" . htmlspecialchars($data['kategori']) . "</span>";
        echo "<p class='font-semibold text-gray-800 dark:text-white mb-1'>" . htmlspecialchars($data['judul']) . "</p>";
        echo "<p class='text-sm text-gray-600 dark:text-gray-300 mb-2'>" . htmlspecialchars($data['deskripsi']) . "</p>";
        echo "<div class='flex justify-between text-sm'>";
        echo "<a href='edit_gallery.php?id_gallery={$data['id_gallery']}' class='text-pink-600 dark:text-pink-400 hover:underline'>Edit</a>";
        echo "<a href='delete_gallery.php?id_gallery={$data['id_gallery']}' onclick='return confirm(\"Yakin ingin menghapus?\")' class='text-red-600 dark:text-red-400 hover:underline'>Hapus</a>";
        echo "</div></div></div>";
      }
      ?>
    </div>
  </main>
</div>

<!-- Footer -->
<footer class="bg-pink-800 dark:bg-gray-800 text-white dark:text-pink-400 text-center py-4 mt-10 transition-all">
  &copy; <?php echo date('Y'); ?> | Created by Dewi Rahma
</footer>

</body>
</html>
