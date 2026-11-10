<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Latihan 3 - Perulangan dan Array</title>
 <style>
 body{font-family:Arial,Helvetica,sans-serif;max-width:760px;margin:30px auto;padding:0 20px;color:#222;line-height:1.55}
 .id{background:#1f3864;color:#fff;padding:10px 14px;border-radius:4px;font-size:14px;margin-bottom:20px}
 label{display:block;margin-top:10px;font-weight:bold}
 input{padding:6px;width:100%;box-sizing:border-box;margin-top:4px}
 button{margin-top:14px;padding:8px 16px;margin-right:6px}
 .error{background:#fdecea;border:1px solid #e57373;padding:10px 14px;margin:12px 0}
 .ok{background:#e8f5e9;border:1px solid #81c784;padding:10px 14px;margin:12px 0}
 table{border-collapse:collapse;margin-top:8px}
 td,th{border:1px solid #999;padding:6px 10px;text-align:left}
 .nav{margin-top:30px;font-size:14px}
 </style>
</head>
<body>
<div class="id">Sairin bin Rubad | NIM 312510134 | Praktikum 7 - Pemrograman Server-Side PHP</div>
<h1>Latihan 3 - Perulangan dan Array</h1>
<?php
$mahasiswa = ["Alya", "Bima", "Citra", "Doni", "Sairin bin Rubad", "Eka", "Farah"];

echo "<h3>Daftar Mahasiswa</h3><ol>";
foreach ($mahasiswa as $nama) {
 echo "<li>" . htmlspecialchars($nama) . "</li>";
}
echo "</ol>";
echo "<p>Jumlah mahasiswa: " . count($mahasiswa) . "</p>";
?>
<p class="nav"><a href="index.php">&larr; Kembali ke menu</a></p>
</body>
</html>
