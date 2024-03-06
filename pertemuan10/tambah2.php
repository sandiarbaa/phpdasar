<?php
// koneksi ke DBMS
// require 'functions.php';
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
    // var_dump($_POST);
    // ambil data dari tiap elemen dalam form
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $prodi = $_POST["prodi"];
    $gambar = $_POST["gambar"];

    // insert query
    $query = "INSERT INTO mahasiswa VALUES ('', '$nim', '$nama', '$email', '$prodi', '$gambar')";
    mysqli_query($conn, $query);

    // cek apakah data berhasil di tambahkan atau tidak
    // pada saat berhasil / gagal memasukkan data, itu ada sebuah fungsi yg memberitahu,
    // ada berapa baris yg berubah di dalam mysql nya.
    // Setiap kita memanipulasi data (tambah/hapus/ubah) ada tulisan Query OK, berapa row affected.
    // Nah itu di dapatkan dari sebuah fungsi yg bernama mysqli_affected_rows().
    // Dia akan menghasilkan sebuah angka, ada berapa baris dalam tabel yg terpengaruhi (tambah/hapus/ubah).
    // Ada data yg masuk nanti nilai nya 1, ada data yg kehapus nilainya juga 1
    // Kalau error nanti nilai nya akan menghasilkan -1. Kalau fungsinya berhasil nanti nilainya 1
    // dan fungsi di jalankan.
    // var_dump(mysqli_affected_rows($conn));
    // =================================================
    // cek apakah data berhasil di tambahkan atau tidak
    // jadi kalau ada data yg masuk, kan nilai dari fungsi ini 1, jadi kalau lebih besar dari 0
    // ada yg berubah pasti.
    if( mysqli_affected_rows($conn) > 0 ) {
        echo "berhasil!";
    } else {
        echo "gagal!";
        echo "<br>";
        echo mysqli_error($conn);
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data mahasiswa</title>
</head>
<body>
    <h1>Tambah data mahasiswa</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="nim">NIM :</label>
                <input type="text" name="nim" id="nim" />
            </li>
            <li>
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" />
            </li>
            <li>
                <label for="email">Email :</label>
                <input type="text" name="email" id="email" />
            </li>
            <li>
                <label for="prodi">Prodi :</label>
                <input type="text" name="prodi" id="prodi" />
            </li>
            <li>
                <label for="gambar">Gambar :</label>
                <input type="text" name="gambar" id="gambar" />
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data!</button>
            </li>
        </ul>
    </form>
</body>
</html>