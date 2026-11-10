<?php
// ===== Eksperimen 3: function format Rupiah =====
function formatRupiah($angka) {
 return "Rp" . number_format($angka, 0, ",", ".");
}

// ===== Eksperimen 1: rata-rata tiga komponen nilai =====
$tugas = 85;
$uts = 78;
$uas = 90;
$rataRata = ($tugas + $uts + $uas) / 3;

// ===== Eksperimen 2: pencarian nama dengan GET =====
$daftarNama = ["Alya", "Bima", "Citra", "Doni", "Eka", "Fajar", "Gita"];
$cari = trim($_GET["cari"] ?? "");
$hasilCari = [];
if ($cari !== "") {
 foreach ($daftarNama as $n) {
  if (stripos($n, $cari) !== false) {
   $hasilCari[] = $n;
  }
 }
}

// ===== Eksperimen 4: validasi NIM (angka saja, tepat 9 digit) =====
$panjangNim = 9;
$nimPesan = "";
$nimValid = null;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
 $nimInput = trim($_POST["nim"] ?? "");
 if ($nimInput === "") {
  $nimPesan = "NIM wajib diisi.";
  $nimValid = false;
 } elseif (!ctype_digit($nimInput)) {
  $nimPesan = "NIM hanya boleh berisi angka.";
  $nimValid = false;
 } elseif (strlen($nimInput) !== $panjangNim) {
  $nimPesan = "NIM harus terdiri dari $panjangNim digit.";
  $nimValid = false;
 } else {
  $nimPesan = "NIM valid: " . $nimInput;
  $nimValid = true;
 }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <title>Eksperimen Mandiri</title>
 <link rel="stylesheet" href="style.css">
</head>
<body>
 <h2>Eksperimen Mandiri</h2>

 <h3>1. Rata-rata Tiga Komponen Nilai</h3>
 <p>Tugas = <?= $tugas ?>, UTS = <?= $uts ?>, UAS = <?= $uas ?></p>
 <p>Rata-rata: <strong><?= number_format($rataRata, 2) ?></strong></p>

 <h3>2. Cari Nama (GET)</h3>
 <form method="GET" action="">
  <label for="cari">Cari nama mahasiswa:</label>
  <input id="cari" name="cari" type="text" value="<?= htmlspecialchars($cari, ENT_QUOTES, "UTF-8") ?>">
  <button type="submit">Cari</button>
 </form>
 <?php if ($cari !== ""): ?>
  <p>Hasil pencarian "<?= htmlspecialchars($cari, ENT_QUOTES, "UTF-8") ?>":</p>
  <?php if ($hasilCari): ?>
   <ul>
    <?php foreach ($hasilCari as $n): ?>
     <li><?= htmlspecialchars($n, ENT_QUOTES, "UTF-8") ?></li>
    <?php endforeach; ?>
   </ul>
  <?php else: ?>
   <p class="error">Nama tidak ditemukan.</p>
  <?php endif; ?>
 <?php endif; ?>

 <h3>3. Function Format Rupiah</h3>
 <p>formatRupiah(15000) = <?= formatRupiah(15000) ?></p>
 <p>formatRupiah(1250000) = <?= formatRupiah(1250000) ?></p>
 <p>formatRupiah(99999.5) = <?= formatRupiah(99999.5) ?></p>

 <h3>4. Validasi NIM (angka saja, <?= $panjangNim ?> digit)</h3>
 <form method="POST" action="" novalidate>
  <label for="nim">NIM:</label>
  <input id="nim" name="nim" type="text">
  <button type="submit">Validasi</button>
  <button type="reset">Reset</button>
 </form>
 <?php if ($nimValid !== null): ?>
  <p class="<?= $nimValid ? "ok" : "error" ?>"><?= htmlspecialchars($nimPesan, ENT_QUOTES, "UTF-8") ?></p>
 <?php endif; ?>

 <h3>5. Tombol Reset vs Pemrosesan Ulang di Server</h3>
 <div class="info">
  <p><strong>Tombol Reset</strong> (<code>type="reset"</code>) hanya dijalankan di browser: isi
  kolom dikembalikan ke nilai awal tanpa mengirim permintaan ke server, sehingga halaman tidak dimuat ulang.</p>
  <p><strong>Pemrosesan ulang di server</strong> terjadi saat form dikirim (submit) atau halaman
  dimuat ulang: browser mengirim permintaan baru, PHP dijalankan lagi, lalu browser menerima
  hasil HTML yang baru.</p>
 </div>
</body>
</html>
