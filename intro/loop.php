<?php
  echo "<h4>1. Perulangan FOR (Angka 1 - 5):</h4>";
  for ($i = 1; $i <= 5; $i++) {
      echo "Angka ke-" . $i . "<br>";
  }

  echo "<h4>2. Perulangan WHILE (Hitung Mundur 5 - 1):</h4>";
  $j = 5;
  while ($j >= 1) {
      echo "Hitung: " . $j . "<br>";
      $j--;
  }

  echo "<h4>3. Perulangan DO-WHILE (Minimal Dieksekusi 1 Kali):</h4>";
  $k = 10;
  do {
      echo "Nilai k saat ini: " . $k . " (Kondisi k < 5 sebenarnya bernilai false)<br>";
      $k++;
  } while ($k < 5);
?>

<?php
  // Indexed Array
  $matakuliah = ["Pemrograman Web", "Basis Data", "Jaringan Komputer", "Sistem Operasi"];

  echo "<h4>Daftar Mata Kuliah:</h4><ol>";
  foreach ($matakuliah as $mk) {
      echo "<li>" . $mk . "</li>";
  }
  echo "</ol>";

  // Associative Array
  $nilaiUjian = [
      "Budi" => 88,
      "Siti" => 95,
      "Andi" => 72
  ];

  echo "<h4>Daftar Nilai Ujian:</h4><ul>";
  foreach ($nilaiUjian as $nama => $nilai) {
      echo "<li><strong>" . $nama . ":</strong> " . $nilai . " pts</li>";
  }
  echo "</ul>";
?>

<?php
  echo "<h4>Mencari Angka (Berhenti saat menemukan angka 7 dengan break):</h4>";
  for ($i = 1; $i <= 10; $i++) {
      if ($i === 7) {
          echo "<strong style='color:red;'>Angka " . $i . " ditemukan! Perulangan dihentikan.</strong><br>";
          break; // Keluar dari loop
      }
      echo "Memeriksa angka: " . $i . "<br>";
  }

  echo "<h4>Menampilkan Angka Ganjil Saja (Melompati angka genap dengan continue):</h4>";
  for ($n = 1; $n <= 10; $n++) {
      if ($n % 2 === 0) {
          continue; // Lompat ke angka berikutnya jika genap
      }
      echo "Angka Ganjil: " . $n . "<br>";
  }
?>

<?php
  $tinggi = 5;

  echo "<h4>Pola Segitiga Bintang:</h4>";
  for ($i = 1; $i <= $tinggi; $i++) {
      for ($j = 1; $j <= $i; $j++) {
          echo "* ";
      }
      echo "<br>";
  }
?>

<form>
  <label for="tgl">Pilih Tanggal Lahir:</label>
  <select id="tgl" name="tgl">
    <?php
      for ($t = 1; $t <= 31; $t++) {
          // Menambahkan angka 0 di depan jika < 10 (contoh: 01, 02)
          $val = str_pad($t, 2, "0", STR_PAD_LEFT);
          echo "<option value='{$val}'>{$val}</option>";
      }
    ?>
  </select>

  <label for="tahun">Tahun:</label>
  <select id="tahun" name="tahun">
    <?php
      $tahunSekarang = 2026;
      for ($thn = $tahunSekarang; $thn >= 1980; $thn--) {
          echo "<option value='{$thn}'>{$thn}</option>";
      }
    ?>
  </select>
</form>

<?php
  $katalogProduk = [
      ["nama" => "Kemeja Polos", "harga" => 150000, "is_ready" => true],
      ["nama" => "Celana Chinos", "harga" => 220000, "is_ready" => false],
      ["nama" => "Jaket Parka", "harga" => 350000, "is_ready" => true]
  ];
?>

<h4>Katalog Produk Toko:</h4>
<table border="1" cellpadding="8" cellspacing="0">
  <tr style="background:#eee;">
    <th>No</th>
    <th>Nama Barang</th>
    <th>Harga (Rp)</th>
    <th>Status Stok</th>
  </tr>

  <!-- Menggunakan endforeach; -->
  <?php $no = 1; foreach ($katalogProduk as $produk): ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo htmlspecialchars($produk['nama']); ?></td>
      <td><?php echo number_format($produk['harga'], 0, ',', '.'); ?></td>
      <td>
        <?php if ($produk['is_ready']): ?>
          <span style="color:green;">Tersedia</span>
        <?php else: ?>
          <span style="color:red;">Habis</span>
        <?php endif; ?>
      </td>
    </tr>
  <?php endforeach; ?>
</table>