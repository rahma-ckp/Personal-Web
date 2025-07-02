<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>About | Personal Web</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          fontFamily: {
            poppins: ['Poppins', 'sans-serif'],
          },
        },
      },
    };
  </script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
    .stars-bg {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      z-index: -10;
      background: radial-gradient(circle at 20% 40%, rgba(255,255,255,0.1) 2px, transparent 3px),
                  radial-gradient(circle at 80% 60%, rgba(255,255,255,0.1) 1.5px, transparent 3px),
                  radial-gradient(circle at 50% 20%, rgba(255,255,255,0.1) 2px, transparent 3px);
      background-size: 400px 400px;
      animation: moveStars 60s linear infinite;
    }
    @keyframes moveStars {
      from { background-position: 0 0; }
      to { background-position: -1000px 1000px; }
    }

    .toggle-wrapper input:checked ~ .slider {
      background-color: #9d174d;
    }

    .toggle-wrapper input:checked ~ .slider .dot {
      transform: translateX(100%);
      background-color: #facc15;
    }

    .toggle-wrapper input:checked ~ .slider .icon-moon {
      opacity: 1;
      transform: scale(1);
    }

    .toggle-wrapper input:checked ~ .slider .icon-sun {
      opacity: 0;
      transform: scale(0.5);
    }

    .icon-sun, .icon-moon {
      transition: all 0.3s ease;
    }

    .icon-moon {
      opacity: 0;
      transform: scale(0.5);
    }

    .icon-sun {
      opacity: 1;
      transform: scale(1);
    }
  </style>
</head>

<body class="bg-gradient-to-br from-pink-100 to-pink-300 dark:from-gray-900 dark:to-gray-800 min-h-screen flex flex-col transition-all duration-500 relative">
<div class="stars-bg"></div>

<<!-- Dark Mode Toggle -->
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
<header class="w-full text-white dark:text-pink-400 p-6 text-center text-3xl font-bold bg-pink-600 dark:bg-gray-800 shadow">
  About Me | Dewi Rahma
</header>

<!-- Navigation -->
<nav class="bg-pink-500 dark:bg-gray-800 text-white z-10 dark:text-pink-400">
  <div class="max-w-6xl mx-auto px-4">
    <div class="flex justify-between items-center py-4">
      <div class="text-lg font-bold">Menu</div>
      <button id="menu-toggle" class="md:hidden focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path d="M4 6h16M4 12h16M4 18h16" stroke-width="2"/>
        </svg>
      </button>
      <ul class="hidden md:flex space-x-10 font-medium text-base" id="menu-list">
        <li><a href="index.php" class="hover:underline font-bold">Artikel</a></li>
        <li><a href="gallery.php" class="hover:underline">Gallery</a></li>
        <li><a href="about.php" class="hover:underline">About</a></li>
        <li><a href="admin/login.php" class="hover:underline">Login</a></li>
      </ul>
    </div>
    <ul class="md:hidden hidden flex-col space-y-2 pb-4 text-base" id="mobile-menu">
      <li><a href="index.php" class="block hover:underline font-bold">Artikel</a></li>
      <li><a href="gallery.php" class="block hover:underline">Gallery</a></li>
      <li><a href="about.php" class="block hover:underline">About</a></li>
      <li><a href="admin/login.php" class="block hover:underline">Login</a></li>
    </ul>
  </div>
</nav>

<!-- About Section -->
<main class="flex-grow flex items-center justify-center py-10 px-4">
  <div class="w-full max-w-4xl bg-white dark:bg-gray-900 rounded-xl shadow-2xl p-8 border border-pink-300 dark:border-gray-700 flex flex-col md:flex-row gap-8 items-center animate-fadeIn transition duration-1000 ease-out">
    <img src="images/potoprofil.jpg" alt="Foto Profil" class="w-40 h-40 rounded-full border-4 border-pink-500 dark:border-pink-300 shadow-lg object-cover hover:scale-105 transition duration-300">
    <div class="flex-1 text-center md:text-left">
      <h2 class="text-2xl font-bold text-pink-600 dark:text-pink-300 mb-4">Tentang Saya</h2>
      <div class="text-gray-700 dark:text-gray-200 space-y-4 leading-relaxed">
        <?php
        $sql = "SELECT * FROM tbl_about ORDER BY id_about DESC LIMIT 1";
        $query = mysqli_query($db, $sql);
        $data = mysqli_fetch_array($query);
        echo "<p>" . htmlspecialchars($data['about']) . "</p>";
        ?>
      </div>
      <div class="mt-6 flex justify-center md:justify-start space-x-4 text-2xl">
        <a href="https://www.instagram.com/rhmaaa.v/profilecard/?igsh=OGx2MHVoZDB6cnBv" target="_blank" class="text-pink-500 hover:scale-125 transition"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </div>
</main>

<!-- Footer -->
<footer class="bg-pink-700 dark:bg-gray-800 text-white dark:text-pink-400 text-center py-4 shadow-inner">
  &copy; <?php echo date('Y'); ?> | Created by Dewi Rahma
</footer>

<!-- Script -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const html = document.documentElement;
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
      const menu = document.getElementById('mobile-menu');
      menu.classList.toggle('hidden');
    });
  });
</script>

</body>
</html>
