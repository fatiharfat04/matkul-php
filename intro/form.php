<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Form HTML -->
    <form action="" method="POST">
        <label>Masukkan Nama:</label>
        <input type="text" name="input_nama" required>
        <button type="submit" name="btn_submit">Kirim</button>
    </form>

    <!-- Pemrosesan PHP pada berkas yang sama -->
    <?php
    if (isset($_POST['btn_submit'])) {
        $namaUser = $_POST['input_nama'];
        echo "<p>Selamat datang, <strong>" . htmlspecialchars($namaUser) . "</strong>!</p>";
    }
    ?>
</body>

</html>