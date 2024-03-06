<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");
// parameter mysqli_connect: host, username, password, database

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query); // query
    $rows = []; // array rows untuk menampung data yg di fetch
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row; //setiap data yg sudah di fetch dari object result di masukan ke array rows
    }
    return $rows; // kembalikan array rows, dan bentuknya rows sekarang sudah array associative
}

function tambah($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $gambar = htmlspecialchars($data["gambar"]);

    // ambil data lalu lakukan query
    $query = "INSERT INTO mahasiswa VALUES ('', '$nim', '$nama', '$email', '$prodi', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $gambar = htmlspecialchars($data["gambar"]);

    // ambil data lalu lakukan query
    $query = "UPDATE mahasiswa SET
            nim = '$nim',
            nama = '$nama',
            email= '$email',
            prodi = '$prodi',
            gambar = '$gambar'
            WHERE id = $id
        ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>