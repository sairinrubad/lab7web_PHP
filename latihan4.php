<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <title>Latihan 4 - Function</title>
 <link rel="stylesheet" href="style.css">
</head>
<body>
 <h2>Latihan 4 — Membuat Function</h2>
 <?php
 function hitungDiskon($harga, $persen) {
  $potongan = $harga * ($persen / 100);
  return $harga - $potongan;
 }

 // Function tambahan 1: luas persegi panjang
 function hitungLuasPersegiPanjang($panjang, $lebar) {
  return $panjang * $lebar;
 }

 // Function tambahan 2: menentukan kelulusan (lulus jika nilai >= 60)
 function tentukanKelulusan($nilai) {
  return ($nilai >= 60) ? "Lulus" : "Tidak Lulus";
 }

 $hargaAkhir = hitungDiskon(150000, 10);
 echo "Harga setelah diskon: Rp" . number_format($hargaAkhir, 0, ",", ".") . "<br>";

 echo "Luas persegi panjang (8 x 4): " . hitungLuasPersegiPanjang(8, 4) . "<br>";

 echo "Nilai 78: " . tentukanKelulusan(78) . "<br>";
 echo "Nilai 55: " . tentukanKelulusan(55);
 ?>
</body>
</html>
