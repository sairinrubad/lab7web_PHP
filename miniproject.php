<?php
// ===== BAGIAN PEMROSESAN DATA =====
$data = null;
$error = [];
$old = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
 $nama = trim($_POST["nama"] ?? "");
 $nim = trim($_POST["nim"] ?? "");
 $prodi = trim($_POST["prodi"] ?? "");
 $semesterInput = $_POST["semester"] ?? "";
 $email = trim($_POST["email"] ?? "");

 if ($nama === "") $error[] = "Nama wajib diisi.";
 if ($nim === "") $error[] = "NIM wajib diisi.";
 if ($prodi === "") $error[] = "Program studi wajib diisi.";

 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $error[] = "Format email tidak valid.";
 }

 if (!ctype_digit((string)$semesterInput) ||
  (int)$semesterInput < 1 || (int)$semesterInput > 14) {
  $error[] = "Semester harus berupa angka 1–14.";
 }

 if (!$error) {
  $data = compact("nama", "nim", "prodi", "email");
  $data["semester"] = (int)$semesterInput;
 } else {
  // isi kembali form agar pengguna tidak mengetik ulang
  $old = compact("nama", "nim", "prodi", "email");
  $old["semester"] = $semesterInput;
 }
}

function old($old, $key) {
 return htmlspecialchars($old[$key] ?? "", ENT_QUOTES, "UTF-8");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <title>Mini Project - Formulir Data Mahasiswa</title>
 <link rel="stylesheet" href="style.css">
</head>
<body>
 <!-- ===== BAGIAN TAMPILAN ===== -->
 <h2>Mini Project — Formulir Data Mahasiswa</h2>

 <?php if ($error): ?>
  <div class="error">
   <strong>Terdapat kesalahan pada input:</strong>
   <ul>
    <?php foreach ($error as $pesan): ?>
     <li><?= htmlspecialchars($pesan, ENT_QUOTES, "UTF-8") ?></li>
    <?php endforeach; ?>
   </ul>
  </div>
 <?php endif; ?>

 <?php if ($data): ?>
  <div class="ok">
   <h3>Data Mahasiswa Berhasil Diterima</h3>
   <table>
    <tr><th>Nama</th><td><?= htmlspecialchars($data["nama"], ENT_QUOTES, "UTF-8") ?></td></tr>
    <tr><th>NIM</th><td><?= htmlspecialchars($data["nim"], ENT_QUOTES, "UTF-8") ?></td></tr>
    <tr><th>Program Studi</th><td><?= htmlspecialchars($data["prodi"], ENT_QUOTES, "UTF-8") ?></td></tr>
    <tr><th>Semester</th><td><?= (int)$data["semester"] ?></td></tr>
    <tr><th>Email</th><td><?= htmlspecialchars($data["email"], ENT_QUOTES, "UTF-8") ?></td></tr>
   </table>
  </div>
 <?php endif; ?>

 <!-- novalidate: agar validasi server-side PHP dapat diuji langsung -->
 <form method="POST" action="" novalidate>
  <label for="nama">Nama:</label>
  <input id="nama" name="nama" type="text" value="<?= old($old, "nama") ?>">

  <label for="nim">NIM:</label>
  <input id="nim" name="nim" type="text" value="<?= old($old, "nim") ?>">

  <label for="prodi">Program Studi:</label>
  <input id="prodi" name="prodi" type="text" value="<?= old($old, "prodi") ?>">

  <label for="semester">Semester (1–14):</label>
  <input id="semester" name="semester" type="number" min="1" max="14" value="<?= old($old, "semester") ?>">

  <label for="email">Email:</label>
  <input id="email" name="email" type="email" value="<?= old($old, "email") ?>">

  <button type="submit">Kirim Data</button>
 </form>
</body>
</html>
