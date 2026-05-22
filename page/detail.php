<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/tanah_blambangan/config/koneksi.php';

$database = new Database();
$koneksi = $database->getConnection();

$id = $_GET['id'] ?? 0;

$query = mysqli_query($koneksi, "
    SELECT 
        dp.*,
        k.nama_kategori
    FROM destinasi_produk dp
    LEFT JOIN kategori k
    ON dp.id_kategori = k.id_kategori
    WHERE dp.id_destinasi = '$id'
");

$data = mysqli_fetch_assoc($query);

if(!$data){
    echo "Data destinasi tidak ditemukan";
    exit;
}

?>

<div class="detail-container">

    <div class="detail-image">

        <img 
            src="/tanah_blambangan/assetsWeb/upload/<?= $data['gambar']; ?>"
            alt="<?= $data['nama_destinasi']; ?>"
        >

    </div>

    <div class="detail-content">

        <h1>
            <?= strtoupper($data['nama_destinasi']); ?>
        </h1>

        <div class="detail-info">

            <p>
                <strong>Lokasi:</strong>
                <?= $data['lokasi']; ?>
            </p>

            <p>
                <strong>Kategori:</strong>
                <?= $data['nama_kategori']; ?>
            </p>

            <p>
                <strong>Rating:</strong>
                ⭐ <?= $data['rating']; ?>
            </p>

            <p>
                <strong>Fasilitas:</strong>
                <?= $data['fasilitas']; ?>
            </p>

        </div>

        <div class="detail-deskripsi">

            <h3>Deskripsi</h3>

            <p>
                <?= $data['deskripsi']; ?>
            </p>

        </div>

        <a href="index.php" class="btn-kembali">
            ← Kembali
        </a>

    </div>

</div>