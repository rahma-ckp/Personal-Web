<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}
require_once("../koneksi.php");
$username = $_SESSION['username'];
$sql = "SELECT * FROM tbl_user WHERE username = '$username'";
$query = mysqli_query($db, $sql);
$hasil = mysqli_fetch_array($query);

$jumlah_artikel = mysqli_num_rows(mysqli_query($db, "SELECT id_artikel FROM tbl_artikel"));
$jumlah_gallery = mysqli_num_rows(mysqli_query($db, "SELECT id_gallery FROM tbl_gallery"));
$jumlah_kunjungan = 1573; // dummy
?>
<!DOCTYPE html>
<html lang="en" class="transition duration-300">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
    }
  </script>
  <style>
    .toggle-wrapper input:checked ~ .slider {
      background-color: #be185d;
    }
    .toggle-wrapper input:checked ~ .slider .dot {
      background-color: #f472b6;
      transform: translateX(100%);
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
    .toggle-wrapper input:checked ~ .slider .icon-moon {
      opacity: 1;
      transform: scale(1);
    }
    .toggle-wrapper input:checked ~ .slider .icon-sun {
      opacity: 0;
      transform: scale(0.5);
    }
  </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100 min-h-screen transition duration-300">

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
<header class="bg-pink-900 dark:bg-gray-800 text-white text-center py-6 shadow-md">
  <h1 class="text-3xl font-bold tracking-wide dark:text-pink-400">Halaman Administrator</h1>
</header>

<!-- Content -->
<div class="flex max-w-7xl mx-auto mt-8 px-4 gap-6 transition duration-300">
  <!-- Sidebar -->
  <aside class="w-1/4 bg-pink-100 dark:bg-gray-800 rounded shadow p-6 border border-pink-500">
    <h2 class="text-xl font-semibold text-pink-700 dark:text-pink-300 mb-6 text-center">MENU</h2>
    <ul class="space-y-4 text-gray-700 dark:text-gray-100 text-base">
      <li>
        <a href="beranda_admin.php" class="flex items-center gap-2 hover:text-pink-600 dark:hover:text-pink-300 transition">
          <img src="https://cdn-icons-png.flaticon.com/512/1828/1828490.png" class="w-5 h-5"> Beranda
        </a>
      </li>
      <li>
        <a href="data_artikel.php" class="flex items-center gap-2 hover:text-pink-600 dark:hover:text-pink-300 transition">
          <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="w-5 h-5"> Kelola Artikel
        </a>
      </li>
      <li>
        <a href="data_gallery.php" class="flex items-center gap-2 hover:text-pink-600 dark:hover:text-pink-300 transition">
          <img src="https://cdn-icons-png.flaticon.com/512/3062/3062634.png" class="w-5 h-5"> Kelola Gallery
        </a>
      </li>
      <li>
        <a href="about.php" class="flex items-center gap-2 hover:text-pink-600 dark:hover:text-pink-300 transition">
          <img src="https://cdn-icons-png.flaticon.com/512/471/471664.png" class="w-5 h-5"> About
        </a>
      </li>
      <li>
        <a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');" class="flex items-center gap-2 text-red-600 dark:text-red-400 hover:underline">
          <img src="https://cdn-icons-png.flaticon.com/512/1828/1828479.png" class="w-5 h-5"> Logout
        </a>
      </li>
    </ul>
  </aside>

  <!-- Main -->
  <main class="w-3/4 bg-white dark:bg-gray-800 rounded shadow p-6 ml-6">
    <div class="text-lg mb-4">
      Halo, <strong class="text-pink-700 dark:text-pink-300"><?= $_SESSION['username']; ?></strong>! Apa kabar? 😊
    </div>
    <p class="text-sm text-gray-500 dark:text-gray-300">Silakan gunakan menu di samping untuk mengelola data.</p>

    <!-- Statistik -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
      <div class="bg-white dark:bg-gray-700 border-t-4 border-pink-600 rounded-xl shadow-md p-6 text-center transform transition-transform duration-300 hover:scale-105 hover:shadow-xl hover:shadow-pink-400/40 cursor-pointer">
        <h3 class="text-xl font-semibold text-pink-700 dark:text-pink-300 mb-2">Artikel</h3>
        <p class="text-4xl font-bold"><?= $jumlah_artikel; ?></p>
      </div>
      <div class="bg-white dark:bg-gray-700 border-t-4 border-green-600 rounded-xl shadow-md p-6 text-center transform transition-transform duration-300 hover:scale-105 hover:shadow-xl hover:shadow-green-400/40 cursor-pointer">
        <h3 class="text-xl font-semibold text-green-700 dark:text-green-300 mb-2">Gallery</h3>
        <p class="text-4xl font-bold"><?= $jumlah_gallery; ?></p>
      </div>
      <div class="bg-white dark:bg-gray-700 border-t-4 border-yellow-500 rounded-xl shadow-md p-6 text-center transform transition-transform duration-300 hover:scale-105 hover:shadow-xl hover:shadow-yellow-400/40 cursor-pointer">
        <h3 class="text-xl font-semibold text-yellow-600 dark:text-yellow-300 mb-2">Kunjungan</h3>
        <p class="text-4xl font-bold"><?= $jumlah_kunjungan; ?></p>
      </div>
    </div>

    <!-- Grafik -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-10">
      <div class="bg-white dark:bg-gray-700 p-6 rounded shadow">
        <h3 class="text-xl font-bold mb-4 text-center">Distribusi Konten</h3>
        <canvas id="pieChart"></canvas>
      </div>
      <div class="bg-white dark:bg-gray-700 p-6 rounded shadow">
        <h3 class="text-xl font-bold mb-4 text-center">Aktivitas Bulanan</h3>
        <canvas id="barChart"></canvas>
      </div>
    </div>
  </main>
</div>

<!-- Footer -->
<footer class="bg-pink-800 dark:bg-gray-800 text-white dark:text-pink-400 text-center py-4 mt-10">
  &copy; <?= date('Y'); ?> | Created by Dewi Rahma
</footer>

<!-- Chart JS -->
<script>
const pieCtx = document.getElementById('pieChart');
new Chart(pieCtx, {
  type: 'pie',
  data: {
    labels: ['Artikel', 'Gallery'],
    datasets: [{
      label: 'Distribusi Konten',
      data: [<?= $jumlah_artikel ?>, <?= $jumlah_gallery ?>],
      backgroundColor: ['#ec4899', '#10b981']
    }]
  },
  options: {
    responsive: true,
    plugins: {
      legend: { position: 'bottom' }
    }
  }
});

const barCtx = document.getElementById('barChart');
new Chart(barCtx, {
  type: 'bar',
  data: {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
    datasets: [{
      label: 'Pengunjung',
      data: [120, 190, 300, 500, 200, 300],
      backgroundColor: '#f59e0b'
    }]
  },
  options: {
    responsive: true,
    scales: {
      y: { beginAtZero: true }
    }
  }
});

// Dark mode toggle
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
