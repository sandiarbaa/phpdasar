<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");
// parameter mysqli_connect: host, username, password, database

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query); // query
    $rows = []; 
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row; 
    }
    return $rows; 
}

function tambah($data) {
    global $conn;
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $prodi = htmlspecialchars($data["prodi"]);

    $gambar = upload();
    if( !$gambar ) {
        return false;
    }

    $query = "INSERT INTO mahasiswa VALUES ('', '$nim', '$nama', '$email', '$prodi', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload() {
    // return false;
    $namaFile = $_FILES["gambar"]["name"]; 
    $ukuranFile = $_FILES["gambar"]["size"]; 
    $error = $_FILES["gambar"]["error"]; 
    $tmpName = $_FILES["gambar"]["tmp_name"]; 

    
    if( $error === 4 ) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
            </script>";
        return false; 
    }

    $ektensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile); 
    $ekstensiGambar = strtolower(end($ekstensiGambar)); 
    if( !in_array($ekstensiGambar, $ektensiGambarValid) ) {
        echo "<script>
                alert('yang anda upload bukan gambar!');
        </script>";
        return false;
    }

    if( $ukuranFile > 1000000 ) {
        echo "<script>
                alert('ukuran gambar terlalu besar!');
        </script>";
        return false;
    }

    $namaFileBaru = uniqid(); 
    $namaFileBaru .= '.'; 
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;
    $id = $data["id"];
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    if( $_FILES["gambar"]["error"] === 4 ) {
        $gambar = $gambarLama; 
    } else {
        $gambar = upload(); 
    }
    
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

function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"])); // tidak memperbolehkan '/' dan paksa inputan dari user menjadi huruf kecil
    $password = mysqli_real_escape_string($conn, $data["password"]); // memungkinkan user untuk memasukan password ada tanda kutip nya dan tanda kutipnya akan dimasukkan ke dalam database secara aman
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if( mysqli_fetch_assoc($result) ) {
        echo "
            <script>
                alert('username sudah terdaftar!');
            </script>
        ";
        return false;
    }

    // cek konfirmasi password
    if( $password !== $password2 ) {
        echo "
            <script>
                alert('konfirmasi password tidak sesuai!');
            </script>
        ";
        return false;
    } 

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}

?>