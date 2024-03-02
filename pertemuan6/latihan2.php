<?php
    $mahasiswa = [
        [
            "nama" =>"Sandi Arba Putra",
            "nim" => "2255201259",
            "prodi" => "Teknik Informatika",
            "email" => "sandiarba09@gmail.com",
            "gambar" => "sandi.jpg"
        ],
        [
            "nama" => "Spiderman",
            "nim" => "2155201240",
            "prodi" => "Teknik Informatika",
            "email" => "yinyangml974@gmail.com",
            "gambar" => "spiderman.jpg"
        ]
    ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <!-- Menggunakan foreach -->
    <?php foreach($mahasiswa as $mhs) : ?>
        <ul>
            <li>
                <img src="img/<?= $mhs["gambar"] ?>" alt="sandi">
            </li>
            <li>Nama : <?= $mhs["nama"]; ?></li>
            <li>NIM : <?= $mhs["nim"]; ?></li>
            <li>Prodi : <?= $mhs["prodi"]; ?></li>
            <li>Email : <?= $mhs["email"]; ?></li>
        </ul>
    <?php endforeach; ?>
    
</body>
</html>