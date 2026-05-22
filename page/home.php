<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/tanah_blambangan/config/koneksi.php';

$database = new Database();
$koneksi = $database->getConnection();

// ambil data destinasi + kategori
$query = mysqli_query($koneksi, "
    SELECT 
        dp.*,
        k.nama_kategori
    FROM destinasi_produk dp
    JOIN kategori k
    ON dp.id_kategori = k.id_kategori
    ORDER BY dp.rating DESC
    LIMIT 5
");
?>

<section>

    <div class="hightlight">
        <h1>Destinasi Wisata Terfavorit Bulan Ini</h1>
    </div>

    <?php while($row = mysqli_fetch_assoc($query)) { ?>

        <div class="card-fav">

           <img 
                src="/tanah_blambangan/assetsWeb/upload/<?= $row['gambar']; ?>" 
                alt="<?= $row['nama_destinasi']; ?>"
            > 

            <div class="card-content">

                <h2>
                    <?= strtoupper($row['nama_destinasi']); ?>
                </h2>

                <p>
                    <?= $row['deskripsi']; ?>
                </p>

                <!-- <div class="mb-2">

                    <small>
                        <i class="fas fa-map-marker-alt"></i>
                        <?= $row['lokasi']; ?>
                    </small>

                    <br>

                    <small>
                        <i class="fas fa-star text-warning"></i>
                        <?= $row['rating']; ?>
                    </small>

                    <br>

                    <small>
                        <strong>Kategori:</strong>
                        <?= $row['nama_kategori']; ?>
                    </small>

                    <br>

                    <small>
                        <strong>Fasilitas:</strong>
                        <?= $row['fasilitas']; ?>
                    </small>

                </div> -->

                <a 
                    class="jelajahi" 
                    href="index.php?page=detail&id=<?= $row['id_destinasi']; ?>"
                >
                    Jelajahi
                </a>

            </div>

        </div>

    <?php } ?>

</section>

<div class="favorit">

    <h2>
        Jelajahi Berbagai Destinasi Wisata Disini!
    </h2>

    <p>
        Rasakan pesona Banyuwangi dengan keindahan alam dan budaya yang unik.
        Temukan pengalaman tak terlupakan di setiap sudutnya!
    </p>

</div>

<?php

// ambil satu data rating tertinggi untuk banner
$banner = mysqli_query($koneksi, "
    SELECT *
    FROM destinasi_produk
    ORDER BY rating DESC
    LIMIT 1
");

$dataBanner = mysqli_fetch_assoc($banner);

?>

<div class="card-jelajah">

    <img src="/tanah_blambangan/assetsWeb/gambar/bromo.jpg" alt="">

    <div class="card-konten">

        <h1>
            Jelajahi Berbagai Destinasi Impianmu Disini
            Bersama Tanah Blambangan
        </h1>

    </div>

</div>

<div class="card-rasakan">

    <img src="/tanah_blambangan/assetsWeb/gambar/terakota.jpg" alt="">

    <div class="card-nikmati">

        <h2>
            Bersama Tanah Blambangan, nikmati website katalog wisata
            yang akan selalu siap untuk menampilkan keindahan Banyuwangi.
        </h2>

    </div>

</div>