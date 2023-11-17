# Absensi Universitas dengan GPS dan Google Maps API

Repository ini berisi aplikasi absensi untuk Universitas yang dilengkapi dengan fitur GPS dan menggunakan Google Maps API. Aplikasi ini dikembangkan menggunakan bahasa pemrograman PHP dan memanfaatkan layanan Google Maps API untuk menangani lokasi geografis.

## Fitur

1. **Absensi Mahasiswa**: Mahasiswa dapat melakukan absensi menggunakan fitur GPS pada perangkat mereka.

2. **Google Maps Integration**: Integrasi dengan Google Maps API memungkinkan tampilan peta yang interaktif untuk memudahkan pengguna dalam menentukan lokasi absensi.

3. **Rekap Absensi**: Sistem mencatat dan menyimpan rekap absensi mahasiswa, termasuk informasi lokasi dan waktu.

4. **Pengelolaan Fakultas dan Jurusan**: Admin dapat mengelola data fakultas dan jurusan mahasiswa.

## Cara Penggunaan

1. Clone repository ini ke dalam direktori web server Anda:

   ```bash
   git clone https://github.com/IchsanHanifdeal/absensiunri.git
   ```

2. Konfigurasi Koneksi Database: Edit file `backend/koneksi.php` dan sesuaikan dengan detail koneksi database Anda.

3. Konfigurasi API Key Google Maps: Dapatkan API Key dari [Google Cloud Console](https://console.cloud.google.com/) dan tempatkan di file `backend/koneksi.php`.

4. Jalankan Aplikasi: Buka aplikasi melalui browser Anda dan mulai gunakan fitur-fitur yang disediakan.

## Kontribusi

Jika Anda ingin berkontribusi pada pengembangan aplikasi ini, silakan ikuti langkah-langkah berikut:

1. Fork repository ini.
2. Buat branch untuk fitur atau perbaikan tertentu.
3. Lakukan perubahan sesuai dengan kontribusi Anda.
4. Buat pull request ke branch utama repository ini.

## Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE). Anda bebas menggunakan, menyalin, mengubah, dan mendistribusikan proyek ini, baik untuk keperluan komersial maupun non-komersial.
