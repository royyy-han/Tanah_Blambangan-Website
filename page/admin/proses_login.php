<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/tanah_blambangan/config/koneksi.php';

$database = new Database();
$koneksi = $database->getConnection();

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query(
    $koneksi,
    "SELECT * FROM admin 
     WHERE username='$username' 
     AND password='$password'"
);

$data = mysqli_fetch_assoc($query);

if ($data) {

    $_SESSION['admin'] = $data['username'];

    header("Location: index.php");

} else {

    echo "
        <script>
            alert('Username atau password salah!');
            window.location='login.php';
        </script>
    ";
}
?>