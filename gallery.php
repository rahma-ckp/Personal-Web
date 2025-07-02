<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en" id="htmlRoot">
<head>
  <meta charset="UTF-8" />
  <title>Gallery | Personal Web</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          fontFamily: {
            poppins: ['Poppins', 'sans-serif'],
          },
          colors: {
            pink: {
              DEFAULT: '#ec4899',
              dark: '#db2777',
              light: '#fbcfe8',  // pink muda untuk tanggal
            },
          },
          backgroundImage: {
            galaxy: "url('https://images.unsplash.com/photo-1479659929431-434c7c8f0b78?auto=format&fit=crop&w=1050&q=80')",
          },
        },
      },
    };
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    body { font-family: 'Poppins', sans-serif; }
    .glow-effect {
      box-shadow: 0 0 30px rgba(236, 72, 153, 0.7), 0 0 50px rgba(236, 72, 153, 0.5);
      animation: fadeInGlow 0.3s ease-out;
    }
    @keyframes fadeInGlow {
      from { opacity: 0; transform: scale(0.95); }
      to { opacity: 1; transform: scale(1); }
    }
    .gallery-glow:hover {
      box-shadow: 0 0 30px rgba(236, 72, 153, 0.7), 0 0 50px rgba(236, 72, 153, 0.5);
      transform: scale(1.05);
      transition: all 0.3s ease-out;
    }
    .posting-date {
      font-size: 0.75rem; /* lebih kecil */
      color: #fbcfe8; /* pink muda */
      margin-top: 0.25rem;
      font-weight: 500;
    }
  </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900 dark:bg-galaxy bg-cover bg-fixed text-gray-800 dark:text-gray-100 transition duration-300 relative overflow-x-hidden">

  <!-- Dark Mode Toggle -->
  <div class="fixed top-4 right-4 z-50">
    <label class="flex items-center cursor-pointer relative w-14 h-8">
      <input id="darkToggle" type="checkbox" class="sr-only peer" />
      <div class="w-full h-full bg-pink-200 dark:bg-gray-600 rounded-full peer-checked:bg-pink-600 transition-all duration-300"></div>
      <div class="dot absolute top-1 left-1 w-6 h-6 bg-white rounded-full shadow-md transition-transform duration-300 peer-checked:translate-x-6"></div>
      <svg class="absolute left-1.5 top-1.5 w-5 h-5 text-yellow-400 transition-all duration-300 peer-checked:opacity-0 peer-checked:scale-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m8.485-8.485h1M3.515 12.515h1M16.95 7.05l.707-.707M5.636 18.364l.707-.707M16.95 16.95l.707.707M5.636 5.636l.707.707M12 8a4 4 0 100 8 4 4 0 000-8z" />
      </svg>
      <svg class="absolute right-1.5 top-1.5 w-5 h-5 text-pink-200 opacity-0 scale-50 transition-all duration-300 peer-checked:opacity-100 peer-checked:scale-100" fill="currentColor" viewBox="0 0 24 24">
        <path d="M21 12.79A9 9 0 1111.21 3a7 7 0 109.79 9.79z" />
      </svg>
    </label>
  </div>

  <!-- Header -->
  <header class="bg-pink-600 dark:bg-gray-900 text-white  dark:text-pink-400 text-center p-6 text-2xl font-bold shadow">
    Gallery | Dewi Rahma
  </header>

  <!-- Navbar -->
  <nav class="bg-pink-500 dark:bg-pink-200 text-white z-10 dark:text-pink-400">
    <div class="max-w-6xl mx-auto px-4">
      <div class="flex justify-between items-center py-4">
        <div class="text-lg font-bold">Menu</div>
        <button id="menu-toggle" class="md:hidden focus:outline-none">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16" stroke-width="2" /></svg>
        </button>
        <ul class="hidden md:flex space-x-10 font-medium text-base" id="menu-list">
          <li><a href="index.php" class="hover:underline">Artikel</a></li>
          <li><a href="gallery.php" class="hover:underline font-bold">Gallery</a></li>
          <li><a href="about.php" class="hover:underline">About</a></li>
          <li><a href="admin/login.php" class="hover:underline">Login</a></li>
        </ul>
      </div>
      <ul class="md:hidden hidden flex-col space-y-2 pb-4 text-base" id="mobile-menu">
        <li><a href="index.php" class="block hover:underline">Artikel</a></li>
        <li><a href="gallery.php" class="block hover:underline font-bold">Gallery</a></li>
        <li><a href="about.php" class="block hover:underline">About</a></li>
        <li><a href="admin/login.php" class="block hover:underline">Login</a></li>
      </ul>
    </div>
  </nav>

  <!-- Main -->
  <main class="max-w-6xl mx-auto px-6 py-4">
    <nav class="mb-4 text-sm text-gray-500 dark:text-pink-300">Home / Gallery</nav>

    <!-- Form Filter -->
    <form method="GET" id="searchForm" class="flex flex-col sm:flex-row gap-4 justify-between items-center mb-6 relative">
      <input type="text" name="search" placeholder="Cari judul atau deskripsi..." class="w-full sm:flex-grow px-4 py-2 border border-pink-400 rounded dark:bg-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-pink-500" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" id="inputSearch" autocomplete="off" />

      <div class="flex space-x-2 items-center">
        <button type="submit" class="px-5 py-2 bg-pink-600 text-white rounded-full hover:bg-pink-700 transition">Cari</button>
        <button type="button" id="btnReset" class="px-4 py-2 bg-pink-400 text-white rounded-full hover:bg-pink-500 transition hidden" title="Reset Pencarian"><i class="fas fa-sync-alt"></i></button>
        <i class="fas fa-camera text-pink-600 dark:text-pink-300 text-xl cursor-pointer" title="Icon Kamera"></i>
      </div>
    </form>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
      <?php
      $search = $_GET['search'] ?? '';
      $where = [];

      if ($search) {
        $escaped = mysqli_real_escape_string($db, $search);
        $where[] = "(judul LIKE '%$escaped%' OR deskripsi LIKE '%$escaped%')";
      }

      $whereSQL = count($where) ? 'WHERE ' . implode(' AND ', $where) : '';
      $sql = "SELECT * FROM tbl_gallery $whereSQL ORDER BY id_gallery DESC";
      $query = mysqli_query($db, $sql);
      while ($data = mysqli_fetch_array($query)) {
        echo "<div class='bg-white dark:bg-gray-800 border dark:border-gray-700 rounded shadow overflow-hidden cursor-pointer gallery-glow'>";
        echo "<img src='images/" . htmlspecialchars($data['foto']) . "' loading='lazy' onclick=\"openModal(this.src)\" class='w-full h-48 object-cover' alt='" . htmlspecialchars($data['judul']) . "'>";
        echo "<div class='p-4'>";
        echo "<h3 class='text-lg font-semibold text-pink-600 dark:text-pink-300'>" . htmlspecialchars($data['judul']) . "</h3>";
        echo "<p class='posting-date'>Diposting: 21 Juni 2025</p>";
        echo "<p class='text-sm text-gray-600 dark:text-gray-300 mb-2'>" . htmlspecialchars($data['deskripsi']) . "</p>";
        echo "</div></div>";
      }
      ?>
    </div>
  </main>

  <!-- Lightbox -->
  <div id="lightboxModal" class="fixed inset-0 bg-black bg-opacity-80 hidden justify-center items-center z-50 cursor-pointer">
    <img id="lightboxImg" class="max-h-[90%] rounded shadow-2xl glow-effect" alt="Preview gambar" />
  </div>

  <!-- Footer -->
  <footer class="bg-pink-700 dark:bg-pink-200 text-white dark:text-pink-500 text-center py-4 mt-10 shadow-inner">
    &copy; <?= date('Y') ?> | Created by Dewi Rahma
  </footer>

  <!-- Script -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const html = document.getElementById('htmlRoot');
      const toggle = document.getElementById('darkToggle');
      if (localStorage.getItem('theme') === 'dark') {
        html.classList.add('dark');
        toggle.checked = true;
      }
      toggle.addEventListener('change', () => {
        const isDark = toggle.checked;
        html.classList.toggle('dark', isDark);
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
      });

      document.getElementById('menu-toggle').addEventListener('click', () => {
        document.getElementById('mobile-menu').classList.toggle('hidden');
      });

      const lightboxModal = document.getElementById('lightboxModal');
      const lightboxImg = document.getElementById('lightboxImg');
      window.openModal = function (src) {
        lightboxImg.src = src;
        lightboxModal.classList.remove('hidden');
      };
      lightboxModal.addEventListener('click', () => {
        lightboxModal.classList.add('hidden');
        lightboxImg.src = '';
      });

      const inputSearch = document.getElementById('inputSearch');
      const btnReset = document.getElementById('btnReset');

      function checkResetVisibility() {
        if (inputSearch.value.trim() !== '') {
          btnReset.classList.remove('hidden');
        } else {
          btnReset.classList.add('hidden');
        }
      }

      inputSearch.addEventListener('input', checkResetVisibility);
      checkResetVisibility();

      btnReset.addEventListener('click', () => {
        inputSearch.value = '';
        btnReset.classList.add('hidden');
        window.location.href = window.location.pathname;
      });
    });
  </script>
</body>
</html>
