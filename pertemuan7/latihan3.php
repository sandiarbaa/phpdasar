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
            "prodi" => "Teknik Sipil",
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
    <title>GET</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <ul>
    <?php foreach($mahasiswa as $mhs) : ?>
        <li><a href="latihan4.php?nama=<?= $mhs["nama"]; ?>&nim=<?= $mhs["nim"]; ?>&email=<?= $mhs["email"]; ?>&prodi=<?= $mhs["prodi"]; ?>&gambar=<?= $mhs["gambar"]; ?>"><?= $mhs["nama"]; ?></a></li>
    <?php endforeach; ?>
    </ul>
</body>
</html>