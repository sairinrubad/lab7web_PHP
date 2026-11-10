<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Eksperimen Mandiri</title>
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
<h1>Eksperimen Mandiri</h1>

<h2>1. Rata-rata nilai tiga komponen</h2>
<?php
function hitungRataRata(array $nilai) {
 return array_sum($nilai) / count($nilai);
}
$komponen = ["Tugas" => 85, "UTS" => 78, "UAS" => 90];
foreach ($komponen as $nama => $skor) {
 echo htmlspecialchars($nama) . ": " . $skor . "<br>";
}
echo "<strong>Rata-rata: " . number_format(hitungRataRata($komponen), 2) . "</strong>";
?>

<h2>2. Pencarian nama dengan GET</h2>
<?php
$daftarNama = ["Alya", "Bima", "Citra", "Doni", "Sairin bin Rubad", "Eka", "Farah"];
$cari = trim($_GET["cari"] ?? "");
?>
<form method="GET" action="">
 <label for="cari">Cari nama:</label>
 <input id="cari" name="cari" type="text" value="<?php echo htmlspecialchars($cari, ENT_QUOTES, 'UTF-8'); ?>">
 <button type="submit">Cari</button>
</form>
<?php
if ($cari !== "") {
 $hasil = array_filter($daftarNama, function ($n) use ($cari) {
 return stripos($n, $cari) !== false;
 });
 if (count($hasil) > 0) {
 echo "<p>Ditemukan " . count($hasil) . " nama:</p><ul>";
 foreach ($hasil as $n) {
 echo "<li>" . htmlspecialchars($n) . "</li>";
 }
 echo "</ul>";
 } else {
 echo "<p>Tidak ada nama yang cocok.</p>";
 }
}
?>

<h2>3. Function format Rupiah</h2>
<?php
function formatRupiah($angka) {
 return "Rp" . number_format($angka, 0, ",", ".");
}
echo "150000 &rarr; " . formatRupiah(150000) . "<br>";
echo "1250000 &rarr; " . formatRupiah(1250000) . "<br>";
echo "75000 &rarr; " . formatRupiah(75000);
?>

<h2>4. Validasi NIM (hanya angka, tepat 9 digit)</h2>
<?php
$pesanNim = "";
$kelasNim = "";
$nimInput = "";
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["nim"])) {
 $nimInput = trim($_POST["nim"]);
 if (!ctype_digit($nimInput)) {
 $pesanNim = "NIM hanya boleh berisi angka.";
 $kelasNim = "error";
 } elseif (strlen($nimInput) !== 9) {
 $pesanNim = "NIM harus tepat 9 digit.";
 $kelasNim = "error";
 } else {
 $pesanNim = "NIM valid: " . $nimInput;
 $kelasNim = "ok";
 }
}
?>
<form method="POST" action="">
 <label for="nim">NIM</label>
 <input id="nim" name="nim" type="text" value="<?php echo htmlspecialchars($nimInput, ENT_QUOTES, 'UTF-8'); ?>">
 <button type="submit">Cek NIM</button>
</form>
<?php if ($pesanNim !== ""): ?>
 <div class="<?php echo $kelasNim; ?>"><?php echo htmlspecialchars($pesanNim, ENT_QUOTES, "UTF-8"); ?></div>
<?php endif; ?>

<h2>5. Tombol Reset vs pemrosesan ulang di server</h2>
<form action="" method="POST" onsubmit="return false;">
 <label for="contoh">Contoh isian</label>
 <input id="contoh" type="text">
 <button type="submit">Kirim</button>
 <button type="reset">Reset</button>
</form>
<p>Tombol <strong>Reset</strong> (type="reset") hanya mengosongkan isian form di browser (client-side)
 tanpa mengirim permintaan ke server, sehingga PHP tidak dijalankan. Sebaliknya, tombol
 <strong>Kirim</strong> atau memuat ulang halaman mengirim permintaan ke server, PHP memproses data
 lagi, lalu browser menerima halaman baru dari server.</p>
<p class="nav"><a href="index.php">&larr; Kembali ke menu</a></p>
</body>
</html>
