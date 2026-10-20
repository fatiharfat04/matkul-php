<?php
  // 1. Indexed Array
  $buah = ["Apel", "Jeruk", "Mangga"];
  echo "Buah favorit: " . $buah[0] . "<br>"; // Output: Apel

  // 2. Associative Array
  $mahasiswa = [
      "nama" => "Budi Santoso",
      "nim"  => "2026101001",
      "ipk"  => 3.85
  ];
  echo "Nama Mahasiswa: " . $mahasiswa["nama"] . " (IPK: " . $mahasiswa["ipk"] . ")";
?>

<?php
  $hobi = ["Membaca", "Koding", "Bermain Musik"];
  $profil = [
      "Username" => "alex99",
      "Email"    => "alex@example.com",
      "Status"   => "Aktif"
  ];

  echo "<h4>Daftar Hobi:</h4><ol>";
  foreach ($hobi as $item) {
      echo "<li>" . $item . "</li>";
  }
  echo "</ol>";

  echo "<h4>Profil Pengguna:</h4><ul>";
  foreach ($profil as $kunci => $nilai) {
      echo "<li><strong>" . $kunci . ":</strong> " . $nilai . "</li>";
  }
  echo "</ul>";
?>

<?php
  $listTugas = ["Tugas 1", "Tugas 2"];

  // Menambah elemen baru
  array_push($listTugas, "Tugas 3"); // Menambah di akhir
  $listTugas[] = "Tugas 4";          // Cara singkat menambah di akhir

  // Menghapus elemen
  unset($listTugas[1]); // Menghapus "Tugas 2"

  echo "<pre>";
  print_r($listTugas);
  echo "</pre>";
?>

<?php
  $nilaiSiswa = [
      "Budi"  => 85,
      "Siti"  => 95,
      "Andi"  => 78,
      "Dewi"  => 90
  ];

  // Mengurutkan berdasarkan Nilai (Value) dari tertinggi ke terendah
  krsort($nilaiSiswa);

  echo "<h4>Peringkat Nilai Siswa:</h4><ol>";
  foreach ($nilaiSiswa as $nama => $nilai) {
      echo "<li>" . $nama . " - " . $nilai . "</li>";
  }
  echo "</ol>";
?>

<?php
  $daftarBuku = [
      ["judul" => "Pemrograman PHP", "penulis" => "Rian H.", "stok" => 12],
      ["judul" => "Mastering jQuery", "penulis" => "Siti A.", "stok" => 5],
      ["judul" => "Desain Database", "penulis" => "Budi S.", "stok" => 8]
  ];

  echo "<table border='1' cellpadding='8' cellspacing='0'>
          <tr style='background:#eee;'>
            <th>No</th><th>Judul Buku</th><th>Penulis</th><th>Stok</th>
          </tr>";

  foreach ($daftarBuku as $index => $buku) {
      echo "<tr>
              <td>" . ($index + 1) . "</td>
              <td>" . $buku['judul'] . "</td>
              <td>" . $buku['penulis'] . "</td>
              <td>" . $buku['stok'] . "</td>
            </tr>>";
  }

  echo "</table>";
?>

<?php
  $angka = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

  // Memfilter hanya angka genap
  $angkaGenap = array_filter($angka, function($n) {
      return $n % 2 === 0;
  });

  echo "<br>Angka Genap: " . implode(", ", $angkaGenap);
?>