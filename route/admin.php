<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'dashboard';
}

switch ($page) {
    case 'dashboard':
        include "../../page/admin/admin-page/dashboard.php";
        break;

    default:
        echo "<h3 class='text-center mt-5'>Halaman tidak ditemukan!</h3>";
        break;
}
?>
