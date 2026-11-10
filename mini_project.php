<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Mini Project - Data Mahasiswa</title>
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
<h1>Mini Project - Formulir Data Mahasiswa</h1>
<?php
// ===================== BAGIAN PEMROSESAN DATA =====================
$data = null;
$error = [];
$nama = $nim = $prodi = $email = $semesterInput = "";

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
 $error[] = "Semester harus berupa angka 1-14.";
 }

 if (!$error) {
 $data = compact("nama", "nim", "prodi", "email");
 $data["semester"] = (int)$semesterInput;
 }
}
// ===================== BAGIAN TAMPILAN (HTML) =====================
?>

<?php if ($error): ?>
 <div class="error">
 <strong>Terdapat kesalahan pada input:</strong>
 <ul>
 <?php foreach ($error as $pesan): ?>
 <li><?php echo htmlspecialchars($pesan, ENT_QUOTES, "UTF-8"); ?></li>
 <?php endforeach; ?>
 </ul>
 </div>
<?php endif; ?>

<!-- novalidate dipakai agar validasi server-side dapat diuji langsung dari browser -->
<form method="POST" action="" novalidate>
 <label for="nama">Nama</label>
 <input id="nama" name="nama" type="text" value="<?php echo htmlspecialchars($nama, ENT_QUOTES, 'UTF-8'); ?>">

 <label for="nim">NIM</label>
 <input id="nim" name="nim" type="text" value="<?php echo htmlspecialchars($nim, ENT_QUOTES, 'UTF-8'); ?>">

 <label for="prodi">Program Studi</label>
 <input id="prodi" name="prodi" type="text" value="<?php echo htmlspecialchars($prodi, ENT_QUOTES, 'UTF-8'); ?>">

 <label for="semester">Semester (1-14)</label>
 <input id="semester" name="semester" type="number" min="1" max="14" value="<?php echo htmlspecialchars((string)$semesterInput, ENT_QUOTES, 'UTF-8'); ?>">

 <label for="email">Email</label>
 <input id="email" name="email" type="email" value="<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>">

 <button type="submit">Kirim</button>
</form>

<?php if ($data): ?>
 <div class="ok">
 <h3>Data mahasiswa berhasil diterima</h3>
 <table>
 <tr><th>Nama</th><td><?php echo htmlspecialchars($data["nama"], ENT_QUOTES, "UTF-8"); ?></td></tr>
 <tr><th>NIM</th><td><?php echo htmlspecialchars($data["nim"], ENT_QUOTES, "UTF-8"); ?></td></tr>
 <tr><th>Program Studi</th><td><?php echo htmlspecialchars($data["prodi"], ENT_QUOTES, "UTF-8"); ?></td></tr>
 <tr><th>Semester</th><td><?php echo (int)$data["semester"]; ?></td></tr>
 <tr><th>Email</th><td><?php echo htmlspecialchars($data["email"], ENT_QUOTES, "UTF-8"); ?></td></tr>
 </table>
 </div>
<?php endif; ?>
<p class="nav"><a href="index.php">&larr; Kembali ke menu</a></p>
</body>
</html>
