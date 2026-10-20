<?php
  // Definisi fungsi
  function sapaPengunjung() {
      echo "Selamat datang di Sistem Informasi Akademik!<br>";
      echo "Silakan pilih menu yang tersedia.<hr>";
  }

  // Memanggil fungsi
  sapaPengunjung();
  // sapaPengunjung();
?>

<?php
  // Fungsi dengan default parameter value
  function salam($nama, $waktu = "Pagi") {
      return "Selamat {$waktu}, {$nama}!";
  }

  // Fungsi perhitungan nilai
  function hitungDiskon($totalBelanja, $persenDiskon = 10) {
      $potongan = $totalBelanja * ($persenDiskon / 100);
      return $totalBelanja - $potongan;
  }

  echo salam("Budi", "Siang") . "<br>";
  echo salam("Siti") . "<br><br>"; // Menggunakan default value $waktu = "Pagi"

  $total = 200000;
  $bayar = hitungDiskon($total, 15);
  echo "Total Belanja: Rp " . number_format($total, 0, ',', '.') . "<br>";
  echo "Total Bayar (Setelah Diskon 15%): Rp " . number_format($bayar, 0, ',', '.') . "<br><br>";
?>

<?php
  $namaAplikasi = "Portal Kampus";

  function tampilkanInfo() {
      // Mengakses variabel dari luar fungsi menggunakan kata kunci 'global'
      global $namaAplikasi;
      $versi = "v2.1"; // Variabel lokal

      echo "Aplikasi: " . $namaAplikasi . " (" . $versi . ")<br>";
  }

  tampilkanInfo();
  // echo $versi; // Error: $versi tidak bisa diakses dari luar fungsi!
?>

<?php 
  function tambahPoinPassByValue($poin) {
    $poin += 10; // Menambah poin, tapi hanya dalam lingkup fungsi
  }

  function tambahPoinPassByReference(&$poin) {
    $poin += 10; // Menambah poin, perubahan akan terlihat di luar fungsi
  }

  $poinUser = 50;

  tambahPoinPassByValue($poinUser);
  echo "Poin setelah pass by value: " . $poinUser . "<br>"; // Output: 50

  tambahPoinPassByReference($poinUser);
  echo "Poin setelah pass by reference: " . $poinUser . "<br><br>"; // Output: 60
?>

<?php 
  // function dengan strict type hinting (parameter float/int, return string)
  function formatRupiah(float $nominal): string {
    return "Rp " . number_format($nominal, 0, ',', '.');
  }

  echo formatRupiah(15000) . "<br>"; // Output: Rp 15000

  // anonymous function (closure)
  $hitungLuas = function(int $p, int $l) : int {
    return $p * $l;
  };
  echo "Luas Persegi Panjang (5x4): " . $hitungLuas(5, 4) . " cm² <br>"; // Output: 20
?>

<?php
  // 1. Fungsi String
  $teks = "  belajar php menyenangkan  ";
  echo "<h4>Fungsi String:</h4>";
  echo "Teks Asli: '" . $teks . "'<br>";
  echo "Trim: '" . trim($teks) . "'<br>"; // trim
  echo "Uppercase: " . strtoupper(trim($teks)) . "<br>";
  echo "Jumlah Karakter: " . strlen(trim($teks)) . "<br>";

  // 2. Fungsi Array
  $buah = ["Apel", "Jeruk"];
  array_push($buah, "Mangga", "Pisang"); // Menambah elemen
  echo "<h4>Fungsi Array:</h4>";
  echo "Jumlah Buah: " . count($buah) . "<br>";
  echo "Cetak Array: " . implode(", ", $buah) . "<br>";

  // 3. Fungsi Waktu & Tanggal
  echo "<h4>Fungsi Tanggal:</h4>";
  echo "Tanggal Sekarang: " . date("d-m-Y H:i:s") . "<br>";
?>