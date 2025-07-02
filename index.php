<?php
include "koneksi.php";

$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$search = isset($_GET['search']) ? mysqli_real_escape_string($db, $_GET['search']) : '';
$whereClause = $search ? "WHERE nama_artikel LIKE '%$search%' OR isi_artikel LIKE '%$search%'" : "";

$totalSql = "SELECT COUNT(*) as total FROM tbl_artikel $whereClause";
$totalResult = mysqli_query($db, $totalSql);
$totalRow = mysqli_fetch_assoc($totalResult);
$totalArtikel = $totalRow['total'];
$totalPages = ceil($totalArtikel / $limit);

$sql = "SELECT * FROM tbl_artikel $whereClause ORDER BY id_artikel DESC LIMIT $limit OFFSET $offset";
$query = mysqli_query($db, $sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Personal Web | Dewi Rahma</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>tailwind.config = { darkMode: 'class' }</script>
  <style>
    @keyframes fadeUp {
      0% { opacity: 0; transform: translateY(60px) scale(0.95); }
      100% { opacity: 1; transform: translateY(0) scale(1); }
    }
    .fade-up {
      opacity: 0;
      transform: translateY(60px) scale(0.95);
      animation: fadeUp 0.8s cubic-bezier(0.25, 1, 0.5, 1) forwards;
      box-shadow: 0 8px 30px rgba(255, 105, 180, 0.25);
    }
    .dark .fade-up {
      box-shadow: 0 8px 30px rgba(255, 182, 193, 0.4);
    }
    .fade-delay-100 { animation-delay: 0.1s; }
    .fade-delay-200 { animation-delay: 0.2s; }
    .fade-delay-300 { animation-delay: 0.3s; }
    .fade-delay-400 { animation-delay: 0.4s; }
    .article-card {
      transition: transform 0.4s ease, box-shadow 0.4s ease;
      will-change: transform, opacity;
    }
    .article-card:hover {
      transform: scale(1.04);
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }
    .article-card:active {
      transform: scale(0.98);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    }
    @keyframes clickPop {
      0% { transform: scale(1); box-shadow: 0 0 0 rgba(0,0,0,0); }
      50% { transform: scale(1.12); box-shadow: 0 0 25px rgba(255,105,180,0.6); }
      100% { transform: scale(1); box-shadow: 0 0 0 rgba(0,0,0,0); }
    }
    .article-card.clicked {
      animation: clickPop 0.4s ease;
    }
    .tanggal-post {
      font-size: 0.8rem;
      color: #999;
      margin-bottom: 0.5rem;
    }
  </style>
</head>
<body class="relative bg-pink-50 dark:bg-gray-900 text-pink-900 dark:text-white transition-all duration-500">
  <canvas id="bungaCanvas" class="fixed top-0 left-0 w-full h-full pointer-events-none z-0"></canvas>

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


  <header class="bg-pink-700 dark:bg-gray-800 text-white dark:text-pink-400 text-center p-6 text-2xl font-bold z-10">Personal Web | Dewi Rahma</header>

  <nav class="bg-pink-500 dark:bg-gray-800 text-white z-10 dark:text-pink-400">
    <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
      <div class="text-lg font-bold">Menu</div>
      <ul class="hidden md:flex gap-8 font-medium">
        <li><a href="index.php" class="hover:underline font-bold">Artikel</a></li>
        <li><a href="gallery.php" class="hover:underline">Gallery</a></li>
        <li><a href="about.php" class="hover:underline">About</a></li>
        <li><a href="admin/login.php" class="hover:underline">Login</a></li>
      </ul>
    </div>
  </nav>

  <section class="bg-pink-100 dark:bg-gray-900 py-20 text-center z-10">
    <div class="max-w-4xl mx-auto px-4 fade-up fade-delay-100">
      <h1 class="text-4xl md:text-5xl font-extrabold text-pink-800 dark:text-pink-300 mb-4">Selamat Datang di Website Personal</h1>
      <p class="text-xl md:text-2xl text-pink-700 dark:text-pink-200 font-medium">Dewi Rahma 🌸</p>
    </div>
  </section>

  <section class="max-w-4xl mx-auto p-4 fade-up fade-delay-200 z-10">
    <form method="get" class="flex items-center gap-2 relative">
      <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Cari artikel..."
        class="w-full px-4 py-2 border border-pink-400 rounded dark:bg-gray-700 dark:text-white focus:outline-pink-500 focus:ring-2 focus:ring-pink-400 transition" />
      <button type="submit" class="bg-pink-600 text-white px-4 py-2 rounded hover:bg-pink-700 transition">Cari</button>
      <?php if ($search): ?>
        <a href="index.php" class="ml-2 px-4 py-2 bg-pink-400 text-white rounded hover:bg-pink-500 transition select-none">Reset</a>
      <?php endif; ?>
    </form>
  </section>

  <main class="p-6 grid gap-6 max-w-5xl mx-auto z-10">
    <?php if (mysqli_num_rows($query) > 0): ?>
      <?php $delay = 100; while ($row = mysqli_fetch_assoc($query)): ?>
        <article class="article-card fade-up fade-delay-<?= $delay ?> bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md border-2 border-pink-600 dark:border-pink-400">
          <h2 class="text-2xl font-bold text-pink-800 dark:text-pink-300 mb-1"><?= htmlspecialchars($row['nama_artikel']) ?></h2>
          <div class="tanggal-post">Diposting: 24 Juni 2025</div>
          <?php if (!empty($row['gambar'])): ?>
            <img src="images/<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['nama_artikel']) ?>" class="w-full h-64 object-cover rounded mb-4">
          <?php endif; ?>
          <p class="text-sm text-gray-700 dark:text-gray-300">
            <span class="preview"><?= nl2br(htmlspecialchars(substr($row['isi_artikel'], 0, 200))) ?>...</span>
            <span class="full hidden"><?= nl2br(htmlspecialchars($row['isi_artikel'])) ?></span>
          </p>
          <div class="mt-3">
            <button onclick="toggleArticle(this)" class="text-pink-600 dark:text-pink-300 hover:underline">Baca Selengkapnya →</button>
          </div>
        </article>
      <?php $delay += 100; endwhile; ?>
    <?php else: ?>
      <p class="text-center text-gray-500 dark:text-gray-400">Tidak ada artikel ditemukan.</p>
    <?php endif; ?>
  </main>

  <div class="flex justify-center space-x-2 my-8 z-10">
    <?php if ($page > 1): ?><a href="?page=<?= $page - 1 ?>&search=<?= urlencode($search) ?>" class="px-4 py-2 bg-pink-600 text-white rounded hover:bg-pink-700 transition">Sebelumnya</a><?php endif; ?>
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
      <a href="?page=<?= $i ?>&search=<?= urlencode($search) ?>" class="px-4 py-2 <?= $i == $page ? 'bg-pink-800 text-white' : 'bg-pink-200 text-pink-900 dark:bg-gray-600 dark:text-white' ?> rounded hover:bg-pink-600 hover:text-white transition"> <?= $i ?> </a>
    <?php endfor; ?>
    <?php if ($page < $totalPages): ?><a href="?page=<?= $page + 1 ?>&search=<?= urlencode($search) ?>" class="px-4 py-2 bg-pink-600 text-white rounded hover:bg-pink-700 transition">Selanjutnya</a><?php endif; ?>
  </div>

  <footer class="bg-pink-700 dark:bg-gray-800 text-white dark:text-pink-400 text-center py-4 mt-10 z-10">&copy; <?= date('Y') ?> | Created by Dewi Rahma</footer>

  <script>
    const toggle = document.getElementById('darkToggle');
    const html = document.documentElement;

    if (localStorage.getItem('theme') === 'dark') {
      html.classList.add('dark');
      toggle.checked = true;
    }

    toggle.addEventListener('change', () => {
      const isDark = toggle.checked;
      html.classList.toggle('dark', isDark);
      localStorage.setItem('theme', isDark ? 'dark' : 'light');
    });

    function toggleArticle(btn) {
      const preview = btn.closest('article').querySelector('.preview');
      const full = btn.closest('article').querySelector('.full');
      if (preview.classList.contains('hidden')) {
        preview.classList.remove('hidden');
        full.classList.add('hidden');
        btn.textContent = 'Baca Selengkapnya →';
      } else {
        preview.classList.add('hidden');
        full.classList.remove('hidden');
        btn.textContent = 'Tutup';
      }
    }

    // 🌸 Bunga animasi kecil & smooth
    const canvas = document.getElementById('bungaCanvas');
    const ctx = canvas.getContext('2d');
    let bunga = [];

    function resizeCanvas() {
      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;
    }

    window.addEventListener('resize', resizeCanvas);
    resizeCanvas();

    function buatBunga() {
  for (let i = 0; i < 60; i++) {
    bunga.push({
      x: Math.random() * canvas.width,
      y: Math.random() * canvas.height,
      r: Math.random() * 3 + 3, // 🌸 Ukuran bunga lebih besar
      d: Math.random() * 1 + 0.5,
      color: `rgba(255, ${Math.floor(Math.random() * 100 + 130)}, ${Math.floor(Math.random() * 180 + 180)}, 0.5)`
    });
  }
}


    function gambarBunga() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      bunga.forEach(b => {
        ctx.beginPath();
        ctx.arc(b.x, b.y, b.r, 0, Math.PI * 2);
        ctx.fillStyle = b.color;
        ctx.fill();
      });
      gerakBunga();
    }

    function gerakBunga() {
      bunga.forEach(b => {
        b.y += b.d;
        b.x += Math.sin(b.y * 0.01);
        if (b.y > canvas.height) {
          b.y = -10;
          b.x = Math.random() * canvas.width;
        }
      });
    }

    function animasiBunga() {
      gambarBunga();
      requestAnimationFrame(animasiBunga);
    }

    buatBunga();
    animasiBunga();

    document.querySelectorAll('.article-card').forEach(card => {
      card.addEventListener('click', () => {
        card.classList.add('clicked');
        setTimeout(() => {
          card.classList.remove('clicked');
        }, 400);
      });
    });
  </script>
</body>
</html>
