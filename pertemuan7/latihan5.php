<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST</title>
</head>
<body>
    <!-- ini bisa dipakai, tapi ubah dulu action dari form nya, cukup kosongkan saja -->
    <!-- jadi ini kalau tombol submit ditekan, yg dimana ini menggunakan name dari button yaitu submit -->
    <?php if(isset($_POST["submit"])) : ?>
        <h1>Halo, Selamat Datang <?= $_POST["nama"]; ?></h1>
    <?php endif; ?>
    
    <form action="latihan6.php" method="post">
        Masukkan Nama :
        <input type="text" name="nama">
        <br>
        <button type="submit" name="submit">Kirim!</button>
    </form>
</body>
</html>