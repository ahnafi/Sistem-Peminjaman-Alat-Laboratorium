# 🔬 LABOPHASE — Sistem Peminjaman Alat Praktikum

**LABOPHASE** adalah aplikasi berbasis web yang memfasilitasi peminjaman alat laboratorium oleh mahasiswa sesuai jadwal praktikum mereka. Sistem ini mencakup fitur booking, validasi stok dan jadwal, serta verifikasi admin secara efisien dan transparan.

---

## 🚀 Fitur Utama

### 👨‍🎓 Mahasiswa
- **Login Mahasiswa**  
  Mahasiswa dapat login untuk mengakses sistem dan melakukan peminjaman alat.

- **Dashboard Mahasiswa**  
  Menampilkan ringkasan booking aktif, status, dan jumlah alat tersedia.

- **Daftar Alat**  
  Mahasiswa dapat melihat seluruh daftar alat yang bisa dipinjam lengkap dengan deskripsi dan stok.

- **Form Booking Alat**  
  Mahasiswa memilih alat dan tanggal pinjam, lalu submit permintaan booking.

- **Riwayat Booking**  
  Menampilkan daftar peminjaman dengan status: `pending`, `disetujui`, atau `ditolak`. Booking dapat dibatalkan jika masih `pending`.

- **Profil Mahasiswa**  
  Mahasiswa dapat melihat dan mengedit data akunnya (opsional).

---

### 🛡️ Admin
- **Dashboard Admin**  
  Ringkasan aktivitas sistem seperti jumlah booking hari ini, alat populer, dan statistik dasar.

- **Manajemen Booking**  
  Admin dapat melihat semua booking, memfilter berdasarkan tanggal/status, dan melakukan verifikasi (setujui/tolak) dengan catatan.

- **Manajemen Alat**  
  Tambah, ubah, dan hapus data alat serta mengelola stok.

- **Manajemen Mahasiswa**  
  Admin dapat melihat daftar mahasiswa, menambah, mengubah, atau menghapus akun (opsional).

- **Riwayat Booking Lengkap**  
  Akses semua log peminjaman dari seluruh pengguna. Dapat ditambahkan fitur export (opsional).

---

## 📚 Aspek Pembelajaran

- Validasi stok dan jadwal saat booking.
- Relasi antar entitas: **User ↔ Alat ↔ Booking**.
- Pengelolaan status booking (`pending`, `disetujui`, `ditolak`).
- Penerapan logika dan keamanan dalam sistem peminjaman berbasis role.

---

## 🧠 Logika Sistem Booking

- Booking baru otomatis berstatus `pending`.
- Admin menyetujui → status `disetujui` dan stok alat berkurang.
- Admin menolak → status `ditolak`, stok tetap.
- Stok habis atau tanggal sudah lewat → booking ditolak secara otomatis.
- Mahasiswa tidak bisa mengedit booking yang sudah diverifikasi.

---

## 🌟 Fitur Opsional (Bonus)
- Notifikasi email saat status booking berubah.
- Export data booking ke Excel / PDF.
- Filter jadwal mingguan.
- QR Code untuk verifikasi pengambilan alat.
- Fitur tanggal mulai–selesai untuk booking alat beberapa hari (advance).

---

## 🛠️ Teknologi yang Digunakan
- PHP / CodeIgniter 3 (atau framework lain sesuai implementasi)
- MySQL / MariaDB
- Bootstrap / Tailwind (opsional styling)
- (Opsional) Composer, PHPMailer, dll.

---

## 🏁 Cara Menjalankan Proyek
1. Clone repo ini:
   ```bash
   git clone https://github.com/ahnafi/Sistem-Peminjaman-Alat-Laboratorium.git
   ```
2. Import database dari folder `/database`.
3. Atur koneksi database di `application/config/database.php`.
4. migrasi database dari file database.sql
5. Jalankan di server lokal (XAMPP / Laragon / PHP built-in server).
6. Login menggunakan akun:
	- **Admin:** `admin@labs.com` / `password`

---

## 🤝 Kontribusi
Pull request, issue report, dan feedback sangat diterima untuk pengembangan lebih lanjut. Jangan lupa fork repo ini kalau ingin mengembangkan secara mandiri.

---

## 📄 Lisensi
Proyek ini menggunakan lisensi MIT. Silakan digunakan, dimodifikasi, dan dikembangkan lebih lanjut.
