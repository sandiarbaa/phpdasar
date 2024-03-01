<?php

    // date untuk menampilkan tanggal dalam format tertentu
    // echo date("l, d-M-Y");
    // echo date("l"); // l = day
    // echo date("d") // d = date
    // echo date("M") // M = month (string)
    // echo date("m") // m = month (int)
    // echo date("Y"); // Y = year
    // echo date("l, d-M-Y")

    // Time
    // UNIX Timestamp / EPOCH time (waktu mulai dari 1 januari 1970 sampai saat ini)
    // Unix timestamp, juga dikenal sebagai waktu Epoch atau waktu POSIX, adalah sistem untuk melacak waktu dalam komputasi. Ini mewakili jumlah detik yang telah berlalu sejak epoch Unix, yang didefinisikan sebagai 00:00:00 Waktu Universal Terkoordinasi (UTC) pada tanggal 1 Januari 1970, tanpa menghitung detik kabisat.
    // echo time();
    // echo date("l", time()+60*60*24*2);
    // echo date("l", time()+60*60*24*100);
    // echo date("l", time()-60*60*24*100);
    // echo date("l, d-M-Y", time()+172800);
    // echo date("l", time()-60*60*24*365*19);

    // mktime
    // membuat detik sendiri
    // mktime(0,0,0,0,0,0)
    // jam, menit, detik, bulan, tanggal, tahun
    // echo date("l", mktime(0,0,0,8,17,2005));
    // echo date("l", mktime(0,0,0,8,25,1985)); // Hari Ulang Tahun Pak Sandhika Galih
    // echo date("l, d-M-Y", mktime(0,0,0,7,9,2004)); cara mengecek waktu ulang tahun menggunakan function mktime

    // strtotime
    // echo strtotime("9 jul 2004"); // mengubah waktu menjadi detik
    // echo date("l", strtotime("09 jul 2004"));

    // NOTE
    // Date / Time
    // time() untuk menampilkan detik
    // date() untuk menampilkan tanggal
    // mktime() untuk membuat detik sendiri
    // strtotime() untuk mengubah format string menjadi detik

    // strlen() untuk menghitung panjang string
    // strcmp() untuk membandingkan dua buah string
    // explode() untuk memecah string
    // htmlspecialchars() untuk menghilangkan menjaga dari serangan hacker

    // Utility
    // var_dump() untuk mencetak isi dari sebuah variabel, array, object
    // isset() untuk mengecek apakah sebuah variabel sudah pernah dibuat atau belum, akan menghasilkan true / false
    // empty() untuk mengecek apakah variabel yg ada itu kosong atau tidak
    // die() untuk menghentikan program
    // sleep() untuk memberhentikan program sementara
?>