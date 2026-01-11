<?php
$koneksi = mysqli_connect("localhost", "root", "", "tanah_blambangan");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
