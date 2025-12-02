Aplikasi Inventarisasi barang ini digunakan untuk mendata suatu barang yang dimiliki oleh peusahaan atau organisasi, dll.
pengguna dapat melakukan proses CRUD(Create, Read, Update, dan Delete)untuk mengelola barang.

Fitur
1.Tambah Barang(Create)
  Pengguna dapat menambahkan data barang yang baru
2.Melihat Daftar barang(Read)
  Semua barang akan ditampilkan dalam suatu tabel.
3.Edit Barang(Update)
  Pengguna dapat mengubah data barang jika terjadi perubahan.
4.Hapus Barang(Delete)
  Barang yang sudah tidak ada atau tidak digunakan dapat dihapus.

Seeder
Sebelum menjalankan project, seeder digunakan untuk data awal agar bisa berkerja.
Jalankan Seeder:
"php artisan db:seed" untuk mengisi data awal program

Alur Kerja
1.User Mengakses Halaman Daftar Barang
 -Sistem menampilkan semua data barang dari database.
 -User bisa melihat tabel dan mengakses tombol aksi(Tambah,Edit,Hapus)
 Note:jika user login dengan role karyawan maka user hanya bisa melihat daftar barang, tidak bisa mengakses fitur CRUD.
2.Menambah Barang Baru
 -User klik tombol tambah.
 -User mengisi form.
 -Data dikirim dan disimoan di database
 -User diarahkan kembali ke daftar barang/Kategori.
3.Mengedit Data Barang
 -Pada tabel, user bisa klik tombol edit.
 -Form edit menampilkan data lama.
 -Setelah disimpan,perubahan diperbarui pada database.
4.Menghapus Data barang
 -User klik Delete.
 -Sistem meminta konfirmasi.
 -Data dihapus dari database.

Cara Menjalankan Project
1.Clone project:
git clone <url-project>
2. Install dependency
composer install
Copy file environment
cp .env.example .env
4.Generate Key
php artisan key:generate
5.Buat Database di MYSQL
6.Jalankan migration dan seeder
php artisan migrate --seed
7.jalankan aplikasi
php artisan serve

Akun dengan role admin
"name" => "admin",
"email" => "admin@gmail.com",
"role" => "admin",
"password" =>"12345678"

note:saya mengerjakan ini dibantu oleh AI
