<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Praktikum 7 PHP</title>
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
<h1>Praktikum 7 - Pemrograman Server-Side dengan PHP</h1>
<table>
 <tr><th>Nama</th><td><?php echo htmlspecialchars("Sairin bin Rubad"); ?></td></tr>
 <tr><th>NIM</th><td><?php echo htmlspecialchars("312510134"); ?></td></tr>
 <tr><th>Waktu server</th><td><?php echo date("d-m-Y H:i:s"); ?></td></tr>
</table>
<h3>Daftar Latihan</h3>
<ol>
 <li><a href="latihan1.php">Latihan 1 - Menjalankan PHP</a></li>
 <li><a href="latihan2.php">Latihan 2 - Variabel, operator, dan percabangan</a></li>
 <li><a href="latihan3.php">Latihan 3 - Perulangan dan array</a></li>
 <li><a href="latihan4.php">Latihan 4 - Membuat function</a></li>
 <li><a href="latihan5.php">Latihan 5 - Form dengan GET</a></li>
 <li><a href="latihan6.php">Latihan 6 - Form dengan POST</a></li>
 <li><a href="latihan7.php">Latihan 7 - Pengolahan data sederhana</a></li>
</ol>
<h3>Mini Project dan Eksperimen</h3>
<ul>
 <li><a href="mini_project.php">Mini Project - Aplikasi Formulir Data Mahasiswa</a></li>
 <li><a href="eksperimen.php">Eksperimen Mandiri</a></li>
</ul>
<p class="nav"><a href="index.php">&larr; Kembali ke menu</a></p>
</body>
</html>
