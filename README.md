# Lab7Web_PHP - Praktikum 7: Pemrograman Server-Side dengan PHP

| | |
|---|---|
| **Nama** | Sairin bin Rubad |
| **NIM** | 312510134 |
| **Mata Kuliah** | Pemrograman Web |
| **Topik** | Pemrograman server-side dengan PHP |

## 1. Tujuan Praktikum
- Memahami perbedaan pemrosesan client-side dan server-side.
- Mengenali sintaks PHP dan menjalankan file PHP melalui server lokal.
- Menggunakan variabel, tipe data, operator, percabangan, perulangan, dan function.
- Menerima dan memproses data form HTML dengan metode GET dan POST.
- Melakukan validasi dan sanitasi input dasar sebelum data ditampilkan atau diproses.
- Membangun aplikasi sederhana yang menerima, memproses, dan menampilkan data pengguna.

## 2. Perangkat
Laptop/PC, web browser, Visual Studio Code, PHP, dan server lokal XAMPP/Laragon (Apache).

## 3. Cara Menjalankan Server Lokal
1. Instal XAMPP (atau Laragon), lalu jalankan modul **Apache** dari control panel.
2. Salin folder `Lab7Web_PHP` ke `C:\xampp\htdocs\` (Laragon: `C:\laragon\www\`).
3. Buka browser dan akses `http://localhost/Lab7Web_PHP/` (jangan klik ganda file PHP).
4. Pilih latihan dari halaman menu `index.php`.

## 4. Struktur File
```
Lab7Web_PHP/
|-- index.php          # menu + identitas
|-- latihan1.php       # Menjalankan PHP
|-- latihan2.php       # Variabel, operator, percabangan
|-- latihan3.php       # Perulangan dan array
|-- latihan4.php       # Function
|-- latihan5.php       # Form GET
|-- latihan6.php       # Form POST
|-- latihan7.php       # Pengolahan data (subtotal)
|-- mini_project.php   # Formulir Data Mahasiswa
|-- eksperimen.php     # Eksperimen mandiri 1-5
|-- README.md
`-- screenshots/       # bukti output tiap latihan dan hasil validasi
```

## 5. Ringkasan Hasil
| Latihan | Ringkasan | Screenshot |
|---|---|---|
| 1 | PHP berjalan di server, menampilkan teks dan waktu server | `latihan1_menjalankan_php.png` |
| 2 | Nilai akhir 84,90 menghasilkan predikat B; diuji 5 kombinasi nilai | `latihan2_variabel_percabangan.png` |
| 3 | 7 nama mahasiswa ditampilkan dengan `foreach` | `latihan3_perulangan_array.png` |
| 4 | Function diskon (Rp135.000), luas persegi panjang (32), kelulusan | `latihan4_function.png` |
| 5 | Form GET, kata kunci dibaca dari `$_GET` dan muncul di URL | `latihan5_get.png` |
| 6 | Form POST dengan validasi kosong dan output aman `htmlspecialchars()` | `latihan6_post_*.png` |
| 7 | Subtotal = harga x jumlah, dengan validasi server-side | `latihan7_*.png` |
| Mini Project | Formulir data mahasiswa dengan validasi server-side | `mini_project_*.png` |
| Eksperimen | Rata-rata, pencarian GET, format Rupiah, validasi NIM, reset | `eksperimen_*.png` |

## 6. Kasus Uji Input

### Input valid
1. **Mini Project** - Nama `Sairin bin Rubad`, NIM `312510134`, Prodi `Teknik Informatika`, Semester `3`, Email `sairin@example.com`
   -> semua lolos validasi, ringkasan data ditampilkan (`mini_project_valid_1.png`).
2. **Mini Project** - Semester `14` (batas atas) dan email `siti.aminah@example.ac.id`
   -> lolos validasi (`mini_project_valid_2_batas_semester.png`).
3. **Latihan 7** - Buku Tulis, harga `12500`, jumlah `3` -> subtotal `Rp37.500`; harga desimal `2500.50` x `2` -> `Rp5.001`.

### Input tidak valid
1. **Mini Project** - Nama kosong, email `sairin@`, semester `20`
   -> muncul 3 pesan error: nama wajib diisi, format email tidak valid, semester harus 1-14 (`mini_project_invalid_1_banyak_error.png`).
2. **Mini Project** - semua kolom kosong -> muncul 5 pesan error (`mini_project_invalid_2_input_kosong.png`).
3. **Latihan 7** - jumlah `0` atau data bukan angka -> "Periksa kembali nama barang, harga, dan jumlah."
4. **Latihan 6** - isian hanya spasi -> "Semua kolom wajib diisi." Input berisi tag HTML (`<b>`, `<script>`) tampil sebagai teks biasa, bukan dieksekusi
   (`latihan6_post_tag_html_aman.png`).

## 7. Eksperimen Mandiri
1. **Rata-rata nilai** - function `hitungRataRata()`; (85 + 78 + 90) / 3 = 84,33.
2. **Pencarian GET** - kata kunci dicari pada array nama dengan `stripos()` (tidak peka huruf besar/kecil).
3. **Format Rupiah** - function `formatRupiah()` memakai `number_format($angka, 0, ",", ".")`.
4. **Validasi NIM** - hanya angka (`ctype_digit`) dan tepat 9 digit (`strlen`).
5. **Tombol reset** - `type="reset"` hanya mengosongkan isian di browser tanpa permintaan ke server;
   tombol kirim/refresh membuat server memproses ulang data dan mengirim halaman baru.

## 8. Jawaban Pertanyaan Evaluasi
1. **Perbedaan client-side dan server-side?** Client-side dijalankan di browser pengguna (HTML, CSS, JavaScript), sedangkan server-side dijalankan di server (misalnya PHP) untuk menerima permintaan, memproses data, dan mengirim respons berupa HTML ke browser.
2. **Mengapa file PHP harus dijalankan melalui web server?** Kode PHP harus diinterpretasi oleh engine PHP di server. Jika dibuka dengan klik ganda (`file://`), browser hanya menampilkan kode mentah dan tidak ada pemrosesan.
3. **Fungsi tanda `$`?** Penanda bahwa sebuah nama adalah variabel PHP, misalnya `$nama = "Andi";`.
4. **Perbedaan GET dan POST?** GET mengirim data lewat parameter URL (terlihat di URL, cocok untuk pencarian/permintaan yang tidak mengubah data, jangan untuk data sensitif). POST mengirim data pada body permintaan dan lazim untuk pengiriman form; POST bukan enkripsi sehingga tetap perlu HTTPS.
5. **Mengapa input divalidasi di sisi server?** Validasi HTML (`required`, `type`, `min`) hanya membantu pengguna dan bisa dilewati/dimanipulasi. Server wajib memeriksa ulang agar data yang diproses benar dan aman.
6. **Fungsi `htmlspecialchars()`?** Mengubah karakter khusus HTML (`<`, `>`, `&`, `"`, `'`) menjadi entitas sehingga input pengguna tampil sebagai teks dan tidak dieksekusi sebagai HTML/script (mencegah XSS).
7. **Manfaat function?** Kode dapat dipakai ulang, lebih rapi dan mudah dibaca, mudah diuji dan dirawat, serta mengurangi duplikasi kode.

## 9. Kesimpulan
Praktikum ini menunjukkan bahwa PHP diproses di server dan browser hanya menerima hasil HTML. Data dari form harus divalidasi di server dan ditampilkan kembali dengan `htmlspecialchars()` agar aplikasi lebih aman.
