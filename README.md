🌐**Personal Web**

**Deskripsi**

Personal web ini merupakan sebuah situs web pribadi yang dibuat untuk menampilkan informasi mengenai pemiliknya, seperti biodata, galeri foto, serta artikel. Website ini tidak hanya berfungsi sebagai portofolio digital, tetapi juga sebagai sarana untuk membangun komunikasi antara pemilik dan pengunjung.

Selain menyajikan konten untuk publik, situs ini dilengkapi dengan fitur pengelolaan konten sederhana yang memungkinkan pemilik untuk memperbarui dan mengatur isi web secara langsung. Aplikasi dikembangkan menggunakan bahasa pemrograman PHP dan menyimpan data dalam database MySQL. Untuk tampilan antarmuka, digunakan Tailwind CSS agar desain terlihat modern, responsif, dan mudah disesuaikan.
_____________________________________________________________________________________________________________________________

**Website** ini memiliki dua bagian utama:

**Halaman Publik** **->** yang dapat diakses oleh semua pengunjung.

**Halaman Admin**  **->** yang hanya dapat diakses setelah login, digunakan untuk mengelola konten.
_____________________________________________________________________________________________________________________________
⚙️**Fitur-Fitur**

**1. Login & Logout** 🔐

Fitur ini memungkinkan admin untuk masuk ke dalam sistem melalui halaman login yang dilengkapi dengan validasi data.         Setelah selesai mengelola konten, admin dapat keluar dengan aman menggunakan fitur logout untuk mengakhiri sesi.

**2. Manajemen Artikel**📰

Admin dapat membuat artikel baru dengan memasukkan judul dan isi, serta mengedit atau menghapus artikel yang sudah ada.      Semua artikel yang dipublikasikan akan langsung ditampilkan di halaman utama, dan daftar artikel terbaru akan muncul         secara otomatis di sidebar.

**3. Manajemen Galeri**🖼️

Melalui fitur ini, admin dapat mengunggah gambar beserta judulnya, mengganti gambar yang sudah ada, atau menghapus           gambar    dari sistem. Gambar-gambar ini akan ditampilkan di halaman publik sebagai bagian dari portofolio visual            pemilik situs.

**4. Manajemen About**🧑‍💻

Admin dapat menambahkan atau mengedit deskripsi tentang diri mereka di bagian “About”. Informasi ini kemudian akan           ditampilkan secara menarik di halaman utama untuk memperkenalkan pemilik situs kepada pengunjung.

**5. Pencarian Artikel & Galeri**🔍

Pengunjung dapat mencari artikel atau gambar berdasarkan kata kunci tertentu. Fitur ini memudahkan eksplorasi konten di      situs secara cepat dan efisien, terutama saat jumlah konten sudah cukup banyak.

**6. Dark Mode**🌙

Website menyediakan opsi tampilan dalam dua mode: terang dan gelap. Pengguna bebas memilih mode tampilan sesuai dengan       kenyamanan dan preferensi mereka.

**7. Statistik Pengunjung**📊

Sistem mencatat jumlah kunjungan ke website dan menampilkannya dalam bentuk angka. Data ini berguna bagi admin untuk         mengetahui seberapa banyak situs telah dikunjungi.
_____________________________________________________________________________________________________________________________

💡**Teknologi yang Digunakan**

1. Bahasa Pemrograman : PHP

2. Database : MySQL

3. Frontend : Tailwind CSS, HTML, Javascript

4. Server Side : Apache / XAMPP
_____________________________________________________________________________________________________________________________

📁**Struktur Folder**

![image](https://github.com/user-attachments/assets/fa62be6b-c34c-4d7e-a5f2-d78395e33f72)

_____________________________________________________________________________________________________________________________



🖥️**User Interface Halaman Publik**

**A. Halaman Home / Artikel**

Halaman Home berfungsi sebagai halaman utama yang menampilkan daftar artikel dan artikel terbaru. Tersedia **fitur pencarian** untuk memudahkan pengunjung menemukan artikel berdasarkan kata kunci tertentu. Jika pengunjung ingin membaca artikel secara lengkap, mereka dapat mengklik tombol **"Baca Selengkapnya"** pada setiap ringkasan artikel.

![WhatsApp Image 2025-07-03 at 06 16 20_be89408d](https://github.com/user-attachments/assets/d8a938c1-1e82-4b89-a1e7-054f1e310e44)

![WhatsApp Image 2025-07-03 at 06 16 20_167bfe8c](https://github.com/user-attachments/assets/d35c7a49-748e-45b4-b290-356cf08821f3)

![WhatsApp Image 2025-07-03 at 06 16 21_3989845f](https://github.com/user-attachments/assets/7c92bd99-85b2-4361-b17f-8c88dcaee0a1)

![WhatsApp Image 2025-07-03 at 06 16 21_c6796b44](https://github.com/user-attachments/assets/1b7635b7-f5fb-479c-84b1-e3437a8c4097)


**B. Halaman Gallery**

Halaman Gallery merupakan halaman yang menampilkan koleksi foto pribadi pemilik website. Setiap foto disertai dengan **judul** dan **tanggal upload** sebagai informasi tambahan. Halaman ini dirancang agar tampil menarik dan responsif, sehingga pengunjung dapat menikmati galeri dengan nyaman.

![WhatsApp Image 2025-07-02 at 22 39 03_a7fc9ea1](https://github.com/user-attachments/assets/6d1c2cd7-1b8d-4a54-82f8-8a4d30b2ca5c)

**C. Halaman About**

Halaman About merupakan halaman yang menampilkan deskripsi singkat mengenai pemilik website, Di halaman ini juga terdapat **ikon Instagram**, yang apabila diklik akan mengarahkan pengunjung langsung ke akun Instagram pemilik, sehingga mereka bisa terhubung lebih lanjut melalui media sosial.

![WhatsApp Image 2025-07-03 at 06 16 22_3e830ef4](https://github.com/user-attachments/assets/acb75a51-32dc-45da-bb90-a887f8647b17)

_________________________________________________________________________________________________________________________



📋**User Interface Halaman Admin**

**A. Halaman Login**

Halaman Login adalah halaman yang digunakan untuk mengakses halaman admin. Untuk masuk, pengguna harus memasukkan username dan password yang valid. Pada halaman ini juga terdapat **tombol "Beranda"** yang dapat diklik untuk kembali ke halaman utama website

![WhatsApp Image 2025-07-03 at 06 16 22_bf4d8de8](https://github.com/user-attachments/assets/7ccc7eb9-cbe9-4135-a718-34e191b81211)

**B. Halaman Beranda**

Halaman Beranda merupakan halaman yang menampilkan ringkasan statistik dari isi dan aktivitas website. Di dalamnya terdapat informasi mengenai jumlah artikel yang telah dipublikasikan dan jumlah foto dalam galeri.
Selain itu, halaman ini juga menampilkan **data statistik** lainnya seperti jumlah kunjungan, aktivitas bulanan, serta distribusi konten yang menggambarkan sebaran jumlah artikel dan galeri. Halaman ini membantu admin untuk memantau perkembangan dan performa website secara keseluruhan dalam satu tampilan ringkas.

![WhatsApp Image 2025-07-03 at 06 58 00_a031a66a](https://github.com/user-attachments/assets/177283c1-a83e-4929-9d88-14f58e787ba2)

**C. Halaman Kelola Artikel**

Halaman Kelola Artikel merupakan halaman yang digunakan oleh admin untuk mengelola seluruh konten artikel dalam website. Di halaman ini, admin dapat menampilkan daftar artikel yang sudah ada, menambahkan artikel baru, mengedit isi artikel, maupun menghapus artikel yang tidak diperlukan.
Tersedia juga **fitur pencarian** untuk memudahkan admin menemukan artikel tertentu berdasarkan kata kunci. Saat menambahkan atau mengedit artikel, admin juga dapat menyisipkan foto ke dalam artikel dengan mudah melalui tombol **"Choose File"** untuk mengunggah gambar dari perangkat.
Selain itu, setiap artikel yang dipublikasikan akan secara otomatis **mencatat tanggal posting**, sehingga admin dapat memantau kapan artikel tersebut diterbitkan. Halaman ini dirancang untuk mempermudah proses pengelolaan konten secara efisien dan terstruktur.

![WhatsApp Image 2025-07-03 at 06 58 00_738b2d35](https://github.com/user-attachments/assets/eeeef5b4-4e36-424a-9dbd-3cfe50e2d2e3)

![WhatsApp Image 2025-07-03 at 06 58 01_c891c039](https://github.com/user-attachments/assets/3039b400-8742-45de-9e2e-e4798bc78bc2)

![WhatsApp Image 2025-07-03 at 06 58 01_9dd782a5](https://github.com/user-attachments/assets/298d6e23-343c-4974-9b40-fdb58260f61d)


**D. Halaman Kelola Gallery**

Halaman Kelola Gallery merupakan halaman yang digunakan oleh admin untuk mengelola seluruh koleksi foto dalam website. Di halaman ini, admin dapat menampilkan daftar galeri yang sudah ada, menambahkan foto baru, mengedit data galeri, maupun menghapus foto yang tidak lagi diperlukan.
Tersedia **fitur pencarian** yang memudahkan admin dalam menemukan foto tertentu berdasarkan kata kunci. Selain itu, terdapat juga **fitur kategori**, yang memungkinkan admin untuk mengelompokkan foto ke dalam kategori tertentu. Pengunjung maupun admin dapat memilih kategori yang diinginkan untuk melihat galeri berdasarkan klasifikasi yang lebih spesifik.


![WhatsApp Image 2025-07-03 at 07 02 42_9c50be53](https://github.com/user-attachments/assets/4e634016-1b7b-45f1-bdd6-80404a2b9537)

![WhatsApp Image 2025-07-03 at 07 02 42_eaf3a525](https://github.com/user-attachments/assets/44afac99-54be-47e7-895a-b435e847248a)

![WhatsApp Image 2025-07-03 at 07 02 43_e4f476b3](https://github.com/user-attachments/assets/c7d9a2ac-fbb2-4900-be02-6d8cfeb58987)

**E. Halaman About**

Halaman About merupakan halaman yang digunakan oleh admin untuk mengelola bagian informasi **“Tentang Saya”** pada website. Di halaman ini, admin dapat menampilkan data About yang sudah ada, menambahkan deskripsi baru, mengedit informasi yang ditampilkan, maupun menghapus konten yang tidak diperlukan.
Selain itu, tersedia juga **fitur pencarian** untuk membantu admin menemukan data About tertentu dengan lebih cepat dan efisien, terutama jika terdapat lebih dari satu entri yang pernah dibuat.

![WhatsApp Image 2025-07-03 at 07 02 43_f8d03013](https://github.com/user-attachments/assets/0e91d4c9-f241-4783-84c2-320d19042d7e)

![WhatsApp Image 2025-07-03 at 07 02 43_604477af](https://github.com/user-attachments/assets/f4b579e7-d0d9-4e39-bfb9-bc75c5d9e3ab)

![WhatsApp Image 2025-07-03 at 07 02 44_e8c7e216](https://github.com/user-attachments/assets/63f614c5-992d-4745-addc-681e7eedffdb)






















