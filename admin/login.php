<?php
session_start();
if (isset($_SESSION['username'])) {
  header('location:beranda_admin.php');
  exit;
}
require_once("../koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Login Administrator</title>
  <link rel="icon" href="https://emoji.gg/assets/emoji/9136-pinkstar.gif" />
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
<body class="bg-gradient-to-br from-pink-100 to-pink-300 dark:from-gray-950 dark:via-gray-900 dark:to-indigo-900 min-h-screen flex items-center justify-center transition-all duration-500 relative overflow-hidden">

<!-- Background Bintang -->
<div class="fixed inset-0 z-0 pointer-events-none">
  <canvas id="stars" class="w-full h-full"></canvas>
</div>

<!-- Tombol Beranda + Toggle -->
<div class="fixed top-4 right-4 z-50 flex items-center gap-3">

  <!-- Tombol Beranda -->
  <a href="../index.php"
     class="group flex items-center gap-2 bg-pink-500 hover:bg-pink-600 dark:bg-pink-600 dark:hover:bg-pink-700 text-white px-4 py-2 rounded-full shadow-md transition-all duration-300 transform hover:-translate-y-0.5 active:scale-95 text-sm font-semibold">
    🏠
    <span class="group-hover:underline">Beranda</span>
  </a>

  <!-- Toggle Dark Mode -->
  <label class="flex items-center cursor-pointer relative w-14 h-8">
    <input id="darkToggle" type="checkbox" class="sr-only peer" />
    <div class="w-full h-full bg-pink-400 dark:bg-gray-600 rounded-full transition-all duration-300 peer-checked:bg-pink-600"></div>
    <div class="dot absolute top-1 left-1 w-6 h-6 bg-white rounded-full shadow-md transition-transform duration-300 peer-checked:translate-x-6 peer-checked:bg-yellow-400"></div>
    <svg class="absolute left-1.5 top-1.5 w-5 h-5 text-yellow-400 transition-all duration-300 peer-checked:opacity-0 peer-checked:scale-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m8.485-8.485h1M3.515 12.515h1M16.95 7.05l.707-.707M5.636 18.364l.707-.707M16.95 16.95l.707.707M5.636 5.636l.707.707M12 8a4 4 0 100 8 4 4 0 000-8z" />
    </svg>
    <svg class="absolute right-1.5 top-1.5 w-5 h-5 text-pink-200 opacity-0 scale-50 transition-all duration-300 peer-checked:opacity-100 peer-checked:scale-100" fill="currentColor" viewBox="0 0 24 24">
      <path d="M21 12.79A9 9 0 1111.21 3a7 7 0 109.79 9.79z" />
    </svg>
  </label>
</div>

<!-- Card Login -->
<div class="z-10 bg-white dark:bg-gray-900 backdrop-blur-lg bg-opacity-80 dark:bg-opacity-40 shadow-2xl rounded-xl p-8 w-full max-w-md border border-pink-300 dark:border-pink-500 transition">
  <h2 class="text-3xl font-bold text-center text-pink-700 dark:text-pink-300 mb-6">🔐 Login Admin</h2>

  <form action="cek_login.php" method="post" class="space-y-5">
    <!-- Username -->
    <div>
      <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Username</label>
      <div class="relative">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">👤</span>
        <input type="text" name="username" id="username" required
          class="pl-10 pr-4 py-2 w-full rounded-md border border-pink-500 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-500 shadow focus:shadow-pink-500/40 transition duration-300" />
      </div>
    </div>

    <!-- Password -->
    <div>
      <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Password</label>
      <div class="relative">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">🔑</span>
        <input type="password" name="password" id="password" required
          class="pl-10 pr-4 py-2 w-full rounded-md border border-pink-500 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-500 shadow focus:shadow-pink-500/40 transition duration-300" />
      </div>
    </div>

    <!-- Tombol Aksi -->
    <div class="flex justify-between">
      <button type="submit" name="login"
        class="bg-pink-700 hover:bg-pink-800 text-white px-5 py-2 rounded-full shadow-md hover:shadow-lg hover:scale-105 active:scale-95 transition-all duration-300 flex items-center gap-2">
         Masuk
      </button>
      <button type="reset"
        class="bg-gray-300 hover:bg-gray-400 text-gray-800 dark:bg-gray-600 dark:text-white px-5 py-2 rounded-full shadow-md hover:shadow-lg hover:scale-105 active:scale-95 transition-all duration-300 flex items-center gap-2">
         Batal
      </button>
    </div>
  </form>

  <p class="text-center text-xs text-gray-600 dark:text-gray-400 mt-6">
    &copy; <?php echo date('Y'); ?> - Dewi Rahma
  </p>
</div>

<!-- Animasi Bintang -->
<script>
  const canvas = document.getElementById('stars');
  const ctx = canvas.getContext('2d');
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;

  const stars = Array.from({ length: 100 }, () => ({
    x: Math.random() * canvas.width,
    y: Math.random() * canvas.height,
    radius: Math.random() * 1.2,
    alpha: Math.random(),
    dx: (Math.random() - 0.5) * 0.5,
    dy: (Math.random() - 0.5) * 0.5
  }));

  function draw() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    for (let star of stars) {
      ctx.beginPath();
      ctx.arc(star.x, star.y, star.radius, 0, Math.PI * 2);
      ctx.fillStyle = `rgba(255, 255, 255, ${star.alpha})`;
      ctx.fill();
      star.x += star.dx;
      star.y += star.dy;

      if (star.x < 0 || star.x > canvas.width) star.dx *= -1;
      if (star.y < 0 || star.y > canvas.height) star.dy *= -1;
    }
    requestAnimationFrame(draw);
  }
  draw();
</script>

</body>
</html>
