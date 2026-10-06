<?php
  // Deklarasi fungsi
  function hitungDiskon($harga, $persenDiskon) {
      $potongan = $harga * ($persenDiskon / 100);
      $totalBayar = $harga - $potongan;
      return $totalBayar;
  }

  // Memanggil fungsi
  $hargaAwal = 100000;
  $diskon = 20;
  $hargaAkhir = hitungDiskon($hargaAwal, $diskon);

  echo "Harga Awal: Rp " . number_format($hargaAwal) . "<br>";
  echo "Setelah Diskon " . $diskon . "%: Rp " . number_format($hargaAkhir);
?>