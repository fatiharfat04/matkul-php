<?php
  $umur = 18;
  $punyaSim = true;

  if ($umur >= 17 && $punyaSim) {
      echo "Status: Diizinkan mengendarai kendaraan.<br>";
  } elseif ($umur >= 17 && !$punyaSim) {
      echo "Status: Usia mencukupi, tetapi belum memiliki SIM!<br>";
  } else {
      echo "Status: Belum cukup umur untuk mengendarai kendaraan.<br>";
  }
?>

<?php
  $nilaiUjian = 78;
  
  // Menggunakan Ternary Operator
  $statusLulus = ($nilaiUjian >= 75) ? "LULUS" : "TIDAK LULUS";
  echo "Hasil Ujian: " . $statusLulus . "<br>";

  // Menggunakan Null Coalescing Operator
  // Memeriksa parameter 'user' dari URL ($_GET), jika tidak ada maka gunakan 'Tamu'
  $namaPengguna = $_GET['user'] ?? 'Tamu';
  echo "Selamat Datang, " . htmlspecialchars($namaPengguna) . "!";
?>

<?php
  $kodeHari = 3; // 1 = Senin, 2 = Selasa, dst.
  $namaHari = "";

  switch ($kodeHari) {
      case 1:
          $namaHari = "Senin - Jadwal: Pemrograman Web";
          break;
      case 2:
          $namaHari = "Selasa - Jadwal: Basis Data";
          break;
      case 3:
          $namaHari = "Rabu - Jadwal: Jaringan Komputer";
          break;
      case 4:
          $namaHari = "Kamis - Jadwal: Sistem Operasi";
          break;
      case 5:
          $namaHari = "Jumat - Jadwal: Bahasa Inggris";
          break;
      default:
          $namaHari = "Akhir Pekan - Tidak Ada Jadwal Kuliah";
          break;
  }

  echo "Informasi Hari: " . $namaHari;
?>

<?php
  $roleUser = "admin";

  // Match Expression langsung mengembalikan nilai
  $hakAkses = match ($roleUser) {
      'admin', 'superadmin' => "Akses Penuh: Tambah, Edit, Hapus Data",
      'editor'             => "Akses Terbatas: Tambah dan Edit Data",
      'user'               => "Akses Read-Only: Hanya Lihat Data",
      default              => "Akses Ditolak: Role tidak dikenal!"
  };

  echo "Role: " . ucfirst($roleUser) . "<br>";
  echo "Hak Akses: " . $hakAkses;
?>

<?php
  $usernameInput = "admin";
  $passwordInput = "123456";
  $isAccountActive = false;

  if ($usernameInput === "admin" && $passwordInput === "123456") {
      // Kondisi bersarang di dalam pengecekan kredensial
      if ($isAccountActive) {
          echo "Login Berhasil! Selamat datang di Dashboard.";
      } else {
          echo "Login Gagal: Akun Anda dalam status non-aktif!";
      }
  } else {
      echo "Login Gagal: Username atau Password salah!";
  }
?>

<?php
  $isLoggedIn = true;
  $namaMember = "Siti Aminah";
  $poin = 120;
?>

<!-- Penggunaan sintaks alternatif if : endif; -->
<?php if ($isLoggedIn): ?>
  <div style="background: #d4edda; padding: 10px; border-radius: 4px;">
    <h4 style="margin: 0;">Selamat Datang Kembali, <?php echo htmlspecialchars($namaMember); ?>!</h4>
    
    <?php if ($poin >= 100): ?>
      <p>Status: <strong style="color: gold;">Member VIP (Poin: <?php echo $poin; ?>)</strong></p>
    <?php else: ?>
      <p>Status: Member Regular (Poin: <?php echo $poin; ?>)</p>
    <?php endif; ?>
  </div>
<?php else: ?>
  <div style="background: #f8d7da; padding: 10px; border-radius: 4px;">
    <p style="margin: 0;">Silakan <a href="#">Login</a> untuk mengakses halaman ini.</p>
  </div>
<?php endif; ?>