<?php
  // Associative Array
  $mahasiswa = [
      "nama" => "Siti Aminah",
      "nim" => "2026101001",
      "prodi" => "Informatika"
  ];

  echo "<h3>Data Mahasiswa:</h3>";
  echo "<ul>";
  foreach ($mahasiswa as $key => $val) {
      echo "<li><strong>" . ucfirst($key) . ":</strong> " . $val . "</li>";
  }
  echo "</ul>";
?>