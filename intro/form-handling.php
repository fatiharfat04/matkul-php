<?php
  $nama = $email = "";

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $nama = $_POST['nama'] ?? '';
      $email = $_POST['email'] ?? '';
  }
?>

<form action="" method="POST">
  <label for="nama">Nama Lengkap:</label><br>
  <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>"><br><br>

  <label for="email">Alamat Email:</label><br>
  <input type="email" id="email" name="email" value="<?php echo $email; ?>"><br><br>

  <button type="submit">Kirim Data</button>
</form>

<?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
  <h4>Data Hasil Input:</h4>
  <p>Nama: <strong><?php echo $nama; ?></strong></p>
  <p>Email: <strong><?php echo $email; ?></strong></p>
<?php endif; ?>


<?php
  // Fungsi Helper Sanitasi Data Input
  function bersihkanInput($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
      return $data;
  }

  $komentar = "";
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $komentar = bersihkanInput($_POST['komentar'] ?? '');
  }
?>

<form action="" method="POST">
  <label for="komentar">Komentar Anda:</label><br>
  <textarea name="komentar" id="komentar" rows="4" cols="40"><?php echo $komentar; ?></textarea><br>
  <button type="submit">Kirim Komentar</button>
</form>

<?php if (!empty($komentar)): ?>
  <h4>Komentar Aman Ter-Sanitasi:</h4>
  <p><?php echo $komentar; ?></p>
<?php endif; ?>


<?php
  $emailErr = $umurErr = "";
  $email = $umur = "";

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
      // Validasi Email
      if (empty($_POST["email"])) {
          $emailErr = "Email wajib diisi!";
      } else {
          $email = trim($_POST["email"]);
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailErr = "Format email tidak valid!";
          }
      }

      // Validasi Umur (Angka)
      if (empty($_POST["umur"])) {
          $umurErr = "Umur wajib diisi!";
      } else {
          $umur = trim($_POST["umur"]);
          if (!filter_var($umur, FILTER_VALIDATE_INT) || $umur < 1) {
              $umurErr = "Umur harus berupa angka bulat positif!";
          }
      }
  }
?>

<form action="" method="POST">
  <label>Email:</label><br>
  <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
  <span style="color:red;">* <?php echo $emailErr; ?></span><br><br>

  <label>Umur:</label><br>
  <input type="text" name="umur" value="<?php echo htmlspecialchars($umur); ?>">
  <span style="color:red;">* <?php echo $umurErr; ?></span><br><br>

  <button type="submit">Proses Validasi</button>
</form>


<?php
  $gender = $_POST['gender'] ?? '';
  $hobi = $_POST['hobi'] ?? []; // Menyimpan array elemen checkbox

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
      echo "<h4>Pilihan Anda:</h4>";
      echo "Jenis Kelamin: " . htmlspecialchars($gender) . "<br>";
      echo "Hobi yang Dipilih: ";
      if (!empty($hobi)) {
          echo htmlspecialchars(implode(", ", $hobi));
      } else {
          echo "Tidak ada hobi yang dipilih.";
      }
  }
?>

<form action="" method="POST" style="margin-top:15px;">
  <label>Jenis Kelamin:</label><br>
  <input type="radio" name="gender" value="Laki-laki" <?php if ($gender === 'Laki-laki') echo 'checked'; ?>> Laki-laki
  <input type="radio" name="gender" value="Perempuan" <?php if ($gender === 'Perempuan') echo 'checked'; ?>> Perempuan
  <br><br>

  <label>Hobi (Bisa pilih lebih dari satu):</label><br>
  <input type="checkbox" name="hobi[]" value="Membaca" <?php if (in_array('Membaca', $hobi)) echo 'checked'; ?>> Membaca<br>
  <input type="checkbox" name="hobi[]" value="Olah Raga" <?php if (in_array('Olah Raga', $hobi)) echo 'checked'; ?>> Olah Raga<br>
  <input type="checkbox" name="hobi[]" value="Coding" <?php if (in_array('Coding', $hobi)) echo 'checked'; ?>> Coding<br><br>

  <button type="submit">Simpan Pilihan</button>
</form>


<?php
  $uploadMsg = "";

  if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["dokumen"])) {
      $file = $_FILES["dokumen"];
      $namaFile = $file["name"];
      $ukuranFile = $file["size"];
      $tmpName = $file["tmp_name"];
      $error = $file["error"];

      // Ekstensi yang diperbolehkan
      $ekstensiDiperbolehkan = ['pdf', 'doc', 'docx', 'png', 'jpg'];
      $ext = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

      if ($error === 0) {
          if (!in_array($ext, $ekstensiDiperbolehkan)) {
              $uploadMsg = "Ekstensi file tidak diizinkan!";
          } elseif ($ukuranFile > 2000000) { // Maks 2MB
              $uploadMsg = "Ukuran file terlalu besar (Maksimal 2MB)!";
          } else {
              $uploadMsg = "File <strong>" . htmlspecialchars($namaFile) . "</strong> valid dan siap diunggah.";
              // move_uploaded_file($tmpName, "uploads/" . $namaFile);
          }
      } else {
          $uploadMsg = "Terjadi kesalahan saat unggah file!";
      }
  }
?>

<form action="" method="POST" enctype="multipart/form-data">
  <label>Unggah Dokumen (PDF/DOCX/JPG, Maks 2MB):</label><br>
  <input type="file" name="dokumen" required><br><br>
  <button type="submit">Unggah Berkas</button>
</form>

<?php if (!empty($uploadMsg)): ?>
  <p style="color: blue;"><?php echo $uploadMsg; ?></p>
<?php endif; ?>