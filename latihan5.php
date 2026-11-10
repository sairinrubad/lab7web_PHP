<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <title>Latihan 5 - Form GET</title>
 <link rel="stylesheet" href="style.css">
</head>
<body>
 <h2>Latihan 5 — Memproses Form dengan GET</h2>
 <!-- cari.php -->
 <form method="GET" action="">
  <label for="kata">Kata kunci:</label>
  <input id="kata" name="kata" type="text">
  <button type="submit">Cari</button>
 </form>

 <?php
 if (isset($_GET["kata"])) {
  $kata = trim($_GET["kata"]);
  echo "<p>Kata kunci: " . htmlspecialchars($kata, ENT_QUOTES, "UTF-8") . "</p>";
 }
 ?>
</body>
</html>
