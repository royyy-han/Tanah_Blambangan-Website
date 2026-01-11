<?php 
    
    require_once('config/koneksi.php');

    $genre = new GenreController();

    $page = isset($_GET['page']) ? $_GET['page'] : 'home';

            if($page == 'home') { include "page/home.php"; }
            else if ($page == 'shopall') { include "page/shop-all.php"; }
            else if ($page == 'detail') { include "page/detail.php"; }
            else if($page == 'genre') { $genre->index(); }
            else if($page == 'admin') { include "page/admin/dashboard.php"; }