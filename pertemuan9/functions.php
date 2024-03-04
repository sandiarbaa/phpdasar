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
?>