<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <title>Latihan 3 - Perulangan dan Array</title>
 <link rel="stylesheet" href="style.css">
</head>
<body>
 <h2>Latihan 3 — Perulangan dan Array</h2>
 <?php
 // 4 nama dari modul + 3 nama tambahan (Eka, Fajar, Gita)
 $mahasiswa = ["Alya", "Bima", "Citra", "Doni", "Eka", "Fajar", "Gita"];

 echo "<h3>Daftar Mahasiswa</h3><ol>";
 foreach ($mahasiswa as $nama) {
  echo "<li>" . htmlspecialchars($nama) . "</li>";
 }
 echo "</ol>";
 echo "<p>Jumlah mahasiswa: " . count($mahasiswa) . "</p>";
 ?>
</body>
</html>
