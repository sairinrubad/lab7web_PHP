<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Latihan 7 - Pengolahan Data</title>
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
<h1>Latihan 7 - Pengolahan Data Sederhana</h1>
<?php
$hasil = null;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
 $barang = trim($_POST["barang"] ?? "");
 $hargaInput = $_POST["harga"] ?? "";
 $jumlahInput = $_POST["jumlah"] ?? "";

 if ($barang === "" || !is_numeric($hargaInput) ||
 !ctype_digit((string)$jumlahInput) ||
 (float)$hargaInput < 0 || (int)$jumlahInput < 1) {
 $error = "Periksa kembali nama barang, harga, dan jumlah.";
 } else {
 $harga = (float)$hargaInput;
 $jumlah = (int)$jumlahInput;
 $subtotal = $harga * $jumlah;
 }
}
?>
<form method="POST">
 <label>Nama barang <input name="barang" required></label>
 <label>Harga <input name="harga" type="number" min="0" step="0.01" required></label>
 <label>Jumlah <input name="jumlah" type="number" min="1" step="1" required></label>
 <button type="submit">Hitung</button>
</form>
<?php
if (isset($error)) {
 echo "<p>" . htmlspecialchars($error) . "</p>";
} elseif (isset($subtotal)) {
 echo "<p>Barang: " . htmlspecialchars($barang) . "</p>";
 echo "<p>Subtotal: Rp" . number_format($subtotal, 0, ",", ".") . "</p>";
}
?>
<p class="nav"><a href="index.php">&larr; Kembali ke menu</a></p>
</body>
</html>
