<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <title>Latihan 2 - Variabel, Operator, dan Percabangan</title>
 <link rel="stylesheet" href="style.css">
</head>
<body>
 <h2>Latihan 2 — Variabel, Operator, dan Percabangan</h2>
 <?php
 $nama = "Siti";
 $tugas = 85;
 $uts = 78;
 $uas = 90;

 $nilaiAkhir = ($tugas * 0.30) + ($uts * 0.30) + ($uas * 0.40);

 if ($nilaiAkhir >= 85) {
  $predikat = "A";
 } elseif ($nilaiAkhir >= 75) {
  $predikat = "B";
 } elseif ($nilaiAkhir >= 60) {
  $predikat = "C";
 } else {
  $predikat = "D";
 }

 echo "Nama: " . htmlspecialchars($nama) . "<br>";
 echo "Nilai akhir: " . number_format($nilaiAkhir, 2) . "<br>";
 echo "Predikat: " . $predikat;
 ?>

 <h3>Uji Beberapa Kombinasi Nilai</h3>
 <?php
 $uji = [
  ["Siti", 85, 78, 90],
  ["Budi", 100, 95, 100],
  ["Wawan", 70, 65, 60],
  ["Dewi", 50, 40, 45],
 ];

 echo "<table>";
 echo "<tr><th>Nama</th><th>Tugas</th><th>UTS</th><th>UAS</th><th>Nilai Akhir</th><th>Predikat</th></tr>";
 foreach ($uji as [$n, $t, $u, $a]) {
  $na = ($t * 0.30) + ($u * 0.30) + ($a * 0.40);
  if ($na >= 85) {
   $p = "A";
  } elseif ($na >= 75) {
   $p = "B";
  } elseif ($na >= 60) {
   $p = "C";
  } else {
   $p = "D";
  }
  echo "<tr><td>" . htmlspecialchars($n) . "</td><td>$t</td><td>$u</td><td>$a</td>";
  echo "<td>" . number_format($na, 2) . "</td><td>$p</td></tr>";
 }
 echo "</table>";
 ?>
</body>
</html>
