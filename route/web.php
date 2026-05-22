<?php 

require_once('config/koneksi.php');

$page = $_GET['page'] ?? 'home';

switch($page){

    case 'home':
        include "page/home.php";
        break;

    case 'destinasi':
        include "page/destinasi2.php";
        break;

    case 'shopall':
        include "page/shop-all.php";
        break;

    case 'detail':
        include "page/detail.php";
        break;

    case 'admin':
        include "page/admin/index.php";
        break;

    default:
        include "page/home.php";
        break;
}
?>