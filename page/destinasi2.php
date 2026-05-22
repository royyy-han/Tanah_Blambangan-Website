<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/tanah_blambangan/config/koneksi.php';

$database = new Database();
$koneksi = $database->getConnection();

/*
|--------------------------------------------------------------------------
| PARIWISATA ALAM
|--------------------------------------------------------------------------
*/

$queryAlam = mysqli_query($koneksi, "
    SELECT 
        dp.*,
        k.nama_kategori
    FROM destinasi_produk dp
    JOIN kategori k
    ON dp.id_kategori = k.id_kategori
    WHERE k.nama_kategori = 'Alam'
");
/*
|--------------------------------------------------------------------------
| PARIWISATA BUDAYA
|--------------------------------------------------------------------------
*/

$queryBudaya = mysqli_query($koneksi, "
    SELECT 
        dp.*,
        k.nama_kategori
    FROM destinasi_produk dp
    JOIN kategori k
    ON dp.id_kategori = k.id_kategori
    WHERE k.nama_kategori = 'Budaya'
");

?>

<div class="hightlight">
    <h1>Semua Destinasi Wisata</h1>
</div>

<div class="favorit">
    <h2>
        Temukan berbagai keindahan alam dan budaya Banyuwangi di sini.
    </h2>
</div>

<!-- ================================================= -->
<!-- PARIWISATA ALAM -->
<!-- ================================================= -->

<div class="container my-5">

    <h4 class="mb-4 fw-bold">
        Pariwisata Alam
    </h4>

    <div class="scroll-container">

        <?php while($alam = mysqli_fetch_assoc($queryAlam)) { ?>

            <div class="card-wisata">

                <img 
                    src="/tanah_blambangan/assetsWeb/upload/<?= $alam['gambar']; ?>" 
                    alt="<?= $alam['nama_destinasi']; ?>"
                >

                <div class="card-body">

                    <p>
                        <strong>Nama Wisata</strong><br>
                        <?= $alam['nama_destinasi']; ?>
                    </p>

                    <p>
                        <strong>Lokasi</strong><br>
                        <?= $alam['lokasi']; ?>
                    </p>

                    <p>
                        <strong>Rating</strong><br>

                        <?php
                            $rating = round($alam['rating']);

                            for($i = 1; $i <= 5; $i++){

                                if($i <= $rating){
                                    echo "⭐";
                                } else {
                                    echo "☆";
                                }
                            }
                        ?>

                    </p>

                    <a 
                        class="jelajahi"
                        href="index.php?page=detail&id=<?= $alam['id_destinasi']; ?>"
                    >
                        Jelajahi
                    </a>

                </div>

            </div>

        <?php } ?>

    </div>

</div>

<!-- ================================================= -->
<!-- PARIWISATA BUDAYA -->
<!-- ================================================= -->

<div class="container my-5">

    <h4 class="mb-4 fw-bold">
        Pariwisata Budaya
    </h4>

    <div class="scroll-container">

        <?php while($budaya = mysqli_fetch_assoc($queryBudaya)) { ?>

            <div class="card-wisata">

                <img 
                    src="/tanah_blambangan/assetsWeb/upload/<?= $budaya['gambar']; ?>" 
                    alt="<?= $budaya['nama_destinasi']; ?>"
                >

                <div class="card-body">

                    <p>
                        <strong>Nama Wisata</strong><br>
                        <?= $budaya['nama_destinasi']; ?>
                    </p>

                    <p>
                        <strong>Lokasi</strong><br>
                        <?= $budaya['lokasi']; ?>
                    </p>

                    <p>
                        <strong>Rating</strong><br>

                        <?php
                            $rating = round($budaya['rating']);

                            for($i = 1; $i <= 5; $i++){

                                if($i <= $rating){
                                    echo "⭐";
                                } else {
                                    echo "☆";
                                }
                            }
                        ?>

                    </p>

                    <a 
                        class="jelajahi"
                        href="index.php?page=detail&id=<?= $budaya['id_destinasi']; ?>"
                    >
                        Jelajahi
                    </a>

                </div>

            </div>

        <?php } ?>

    </div>

</div>