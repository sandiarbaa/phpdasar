<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// ambil data dari tabel mahasiswa / query data mahasiswa
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

// misal jika ingin mengecek error
// var_dump($result);
// if(!$result) {
//     echo mysqli_error($conn);
// }

// ambil data (fetch)  mahasiswa dari object result | karena hasil dari result itu bentuknya object
// Fetch (data) dari object result
// mysqli_fetch_row() // mengembalikan array numerik
// mysqli_fetch_assoc() // mengembalikan array associative
// mysqli_fetch_array() // mengembalikan array numerik dan associative / keduanya
// mysqli_fetch_object() // mengembalikan object | var_dump(mysqli_fetch_object($result)->email);

// $mhs = mysqli_fetch_row($result);
// var_dump($mhs[2]);

// $mhs = mysqli_fetch_array($result);
// var_dump($mhs["email"]);

// $mhs = mysqli_fetch_array($result);
// var_dump($mhs);

// $mhs = mysqli_fetch_object($result);
// var_dump($mhs->email);

// var_dump(mysqli_fetch_object($result)->email);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Prodi</th>
        </tr>
        
        <?php $i = 1; ?>
        <?php while( $row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <a href="">ubah</a> |
                <a href="">hapus</a>
            </td>
            <td><img src="img/<?= $row["gambar"]; ?>" alt="gambar"></td>
            <td><?= $row["nim"] ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["prodi"]; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endwhile; ?>
    </table>
</body>
</html>