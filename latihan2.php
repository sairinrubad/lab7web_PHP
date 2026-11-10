<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Latihan 2 - Variabel dan Percabangan</title>
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
<h1>Latihan 2 - Variabel, Operator, dan Percabangan</h1>
<?php
function tentukanPredikat($nilaiAkhir) {
 if ($nilaiAkhir >= 85) {
 return "A";
 } elseif ($nilaiAkhir >= 75) {
 return "B";
 } elseif ($nilaiAkhir >= 60) {
 return "C";
 } else {
 return "D";
 }
}

$nama = "Sairin bin Rubad";
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

<h3>Uji Kombinasi Nilai</h3>
<table>
 <tr><th>Tugas</th><th>UTS</th><th>UAS</th><th>Nilai Akhir</th><th>Predikat</th></tr>
<?php
$kombinasi = [
 [85, 78, 90],
 [100, 100, 100],
 [80, 80, 80],
 [70, 60, 65],
 [50, 40, 45],
];
foreach ($kombinasi as $k) {
 $na = ($k[0] * 0.30) + ($k[1] * 0.30) + ($k[2] * 0.40);
 echo "<tr><td>" . $k[0] . "</td><td>" . $k[1] . "</td><td>" . $k[2] . "</td>";
 echo "<td>" . number_format($na, 2) . "</td><td>" . tentukanPredikat($na) . "</td></tr>";
}
?>
</table>
<p class="nav"><a href="index.php">&larr; Kembali ke menu</a></p>
</body>
</html>
