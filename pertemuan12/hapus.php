<?php
require 'functions.php';

// $_GET["id"] didapat dari url yg dikirim ketika link hapus di index.php di klik, kan itu mengirim id lewat URL
$id = $_GET["id"];

// kalau baris bernilai 1, artinya ada data yg terhapus
if( hapus($id) > 0 ) {
    echo "
        <script>
            alert('data berhasil dihapus!');
            document.location.href = 'index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('data gagal dihapus!');
            document.location.href = 'index.php';
        </script>
    ";
}
?>