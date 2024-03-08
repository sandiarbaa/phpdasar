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

    // upload gambar
    // $gambar kalau berhasil / kalau function upload nya berhasil akan berisi nama gambar, yg didapat dari function upload
    // function upload ini kalau berhasil akan menyebabkan 2 hal..
    // pertama gambar akan diupload, kedua ia akan mengirimkan nama gambar ke $gambar
    // jadi kalau function upload nya gagal, tidak akan ada nama gambar yg dikirimkan ke $gambar
    // jadi juga, kalau gambar nya berhasil di upload, $gambar akan berisi nama gambar
    $gambar = upload();
    // dan jika $gambar sudah berisi nama file gambar nya, maka $gambar bisa di masukan ke query insert VALUES nya tuh dibawah

    // artinya berarti function upload ini gagal, maka query tidak akan di jalankan
    // dan akan menjalankan alert 'data gagal' yg ada di file tambah.php
    // if( $gambar === false ) {
    if( !$gambar ) {
        return false;
    }

    // ambil data lalu lakukan query
    $query = "INSERT INTO mahasiswa VALUES ('', '$nim', '$nama', '$email', '$prodi', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload() {
    // return false;
    $namaFile = $_FILES["gambar"]["name"]; // nama file gambar yg akan diupload
    $ukuranFile = $_FILES["gambar"]["size"]; // ukuran file gambar
    $error = $_FILES["gambar"]["error"]; // ada file gambar yg diupload atau tidak
    $tmpName = $_FILES["gambar"]["tmp_name"]; // tempat penyimpanan sementara file gambar yg di direktori

    // cek apakah tidak ada gambar yg diupload
    if( $error === 4 ) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
            </script>";
        return false; // agar memberitahu, kalau function upload nya gagal, jadi function tambah gagal juga
    }

    // cek apakah yg di upload adalah gambar
    // jadi cek ekstensi dari file yg diupload
    // lalu tentukan ekstensi file apa saja yg boleh diupload
    $ektensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile); //ambil ekstensi file dari gambar yg diupload
    $ekstensiGambar = strtolower(end($ekstensiGambar)); // jadi setelah di explode ambil dulu delimiter yg terakhir, lalu ubah jadi huruf kecil semua
    // in_array untuk mengecek, ada tidak sebuah string di dalam sebuah array
    // parameter default nya, needle(jarum) dan haystack(jerami)
    // in_array akan menghasilkan true jika ada string(jarum) dan false jika tidak ada
    if( !in_array($ekstensiGambar, $ektensiGambarValid) ) {
        // kalau tidak ada ekstensi yg valid, kasih pesan
        echo "<script>
                alert('yang anda upload bukan gambar!');
        </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if( $ukuranFile > 1000000 ) {
        echo "<script>
                alert('ukuran gambar terlalu besar!');
        </script>";
        return false;
    }

    // generate nama gambar baru
    $namaFileBaru = uniqid(); // uniqid() untuk membuat string random, bentuknya angka yg nanti akan menjadi nama gambar nya
    $namaFileBaru .= '.'; // gabung dengan..
    $namaFileBaru .= $ekstensiGambar; // ekstensinya dari $ekstensiGambar yg sudah dibuat di atas
    // var_dump($namaFileBaru); die;

    // lolos pengecekan, gambar siap diupload
    // pindahkan file yg tadi ada di tmp_name(directori) nya, pindahkan ke tujuannya
    // tujuannya itu relatif terhadap file ini, lalu pindahkan ke direktori img
    // lalu tentukan sendiri nama file nya mau apa
    // jadi gabung dengan $namaFile
    // jadi nanti yg di upload namanya sama dengan yg nanti masuk ke dalam database
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    // return nama file nya, karena di function tambah ada variabel $gambar, variabel itu akan berisi nama file gambar yg di hasilkan dari function upload ini
    return $namaFileBaru;
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
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru atau tidak
    // kalau tidak ada gambar kan error dari $_FILES nya bernilai 4
    if( $_FILES["gambar"]["error"] === 4 ) {
        $gambar = $gambarLama; // kalau tidak ada gambar baru, ambil gambar lama
    } else {
        $gambar = upload(); // kalau ada gambar baru, upload gambar baru
    }
    
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

function cari($keyword) {
    $query = "SELECT * FROM mahasiswa
        WHERE
        nama LIKE '%$keyword%' OR
        nim LIKE '%$keyword%' OR
        email LIKE '%$keyword%' OR
        prodi LIKE '%$keyword%'
    ";
    
    return query($query);
}

?>