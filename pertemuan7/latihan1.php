<?php
// Variabel scope / lingkup variabel
$x = 10;

function tampilX() {
    global $x;
    echo $x;
}

tampilX();

?>