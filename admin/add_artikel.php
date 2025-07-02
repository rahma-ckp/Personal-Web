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
    <title>Tambah Artikel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
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

<body class="bg-pinklight dark:bg-gray-900 text-gray-800 dark:text-white min-h-screen">
    <!-- Header -->
    <header class="bg-pinkdark dark:bg-gray-800 text-white text-center py-6 shadow">
        <h1 class="text-3xl font-bold">Tambah Artikel Baru</h1>
    </header>

    <div class="flex max-w-7xl mx-auto mt-8 px-4">
        <!-- Sidebar -->
        <aside class="w-1/4 bg-white dark:bg-gray-800 rounded shadow p-4">
            <h2 class="text-xl font-semibold text-pinkdark dark:text-white mb-4 text-center">MENU</h2>
            <ul class="space-y-2 text-gray-700 dark:text-gray-200">
                <li><a href="beranda_admin.php" class="block hover:text-pinkdark dark:hover:text-pinklight">Beranda</a></li>
                <li><a href="data_artikel.php" class="block font-semibold text-pinkdark dark:text-pinklight">Kelola Artikel</a></li>
                <li><a href="data_gallery.php" class="block hover:text-pinkdark dark:hover:text-pinklight">Kelola Gallery</a></li>
                <li><a href="about.php" class="block hover:text-pinkdark dark:hover:text-pinklight">About</a></li>
                <li>
                    <a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');"
                        class="block text-red-600 hover:underline font-medium">Logout</a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="w-3/4 bg-white dark:bg-gray-800 rounded shadow p-6 ml-6">
            <form action="proses_add_artikel.php" method="post" class="space-y-6">
                <div>
                    <label for="nama_artikel" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Judul Artikel</label>
                    <input type="text" id="nama_artikel" name="nama_artikel" required
                        class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-pinkdark dark:bg-gray-700 dark:border-gray-600 dark:focus:border-pinklight">
                </div>
                <div>
                    <label for="isi_artikel" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Isi Artikel</label>
                    <textarea id="isi_artikel" name="isi_artikel" rows="5" required
                        class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-pinkdark dark:bg-gray-700 dark:border-gray-600 dark:focus:border-pinklight"></textarea>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="submit"
                        class="bg-pinkdark text-white px-4 py-2 rounded hover:bg-pink-700 transition dark:bg-pinkdark dark:hover:bg-pink-700">Simpan</button>
                    <a href="data_artikel.php"
                        class="bg-pinklight text-gray-700 px-4 py-2 rounded hover:bg-pink-200 transition dark:bg-gray-600 dark:text-white dark:hover:bg-gray-500">Batal</a>
                </div>
            </form>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-pinkdark dark:bg-gray-800 text-white text-center py-4 mt-10">
        &copy; <?php echo date('Y'); ?> | Created by Dewi Rahma
    </footer>

    <!-- Dark Mode Toggle -->
    <script>
        // Tambahkan dark mode toggle otomatis berdasar preferensi user
        if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.documentElement.classList.add('dark');
        }
    </script>
</body>

</html>
