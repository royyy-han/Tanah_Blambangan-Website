<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/tanah_blambangan/config/koneksi.php';

$database = new Database();
$koneksi = $database->getConnection();

$query = "
    SELECT 
        dp.id_destinasi,
        dp.nama_destinasi,
        dp.lokasi,
        dp.deskripsi,
        dp.rating,
        dp.gambar,
        k.nama_kategori
    FROM destinasi_produk dp
    JOIN kategori k 
    ON dp.id_kategori = k.id_kategori
";

$result = mysqli_query($koneksi, $query);
?>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h4>Data Destinasi Wisata</h4>

        <a href="index.php?page=form" class="btn btn-primary btn-sm">
            Tambah Destinasi
        </a>

    </div>

    <div class="card shadow-sm">

        <div class="card-body">

            <table class="table table-bordered table-striped">

                <thead class="table-success">
                    <tr>
                        <th>No</th>
                        <th>Nama Destinasi</th>
                        <th>Lokasi</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Rating</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    $no = 1;

                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                    <tr>

                        <td><?= $no++; ?></td>

                        <td><?= $row['nama_destinasi']; ?></td>

                        <td><?= $row['lokasi']; ?></td>

                        <td><?= $row['nama_kategori']; ?></td>

                        <td><?= $row['deskripsi']; ?></td>

                        <td><?= $row['rating']; ?></td>

                        <td>
                            <?php if (!empty($row['gambar'])) { ?>

                                <img
                                    src="/tanah_blambangan/assetsWeb/upload/<?= $row['gambar']; ?>"
                                    width="150"
                                    class="img-thumbnail mb-3"
                                >

                            <?php } else { ?>

                                -

                            <?php } ?>
                        </td>

                        <td>

                            <a
                                href="index.php?page=form&id=<?= $row['id_destinasi']; ?>"
                                class="btn btn-warning btn-sm"
                            >
                                Edit
                            </a>

                            <a
                                href="admin-page/proses.php?hapus=<?= $row['id_destinasi']; ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus data?')"
                            >
                                Hapus
                            </a>

                        </td>

                    </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>