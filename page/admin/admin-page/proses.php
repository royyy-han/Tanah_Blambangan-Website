<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/tanah_blambangan/config/koneksi.php';

$database = new Database();
$koneksi = $database->getConnection();

// ======================
// SIMPAN / EDIT
// ======================

if (isset($_POST['simpan'])) {

    $id             = $_POST['id_destinasi'];
    $nama           = $_POST['nama_destinasi'];
    $lokasi         = $_POST['lokasi'];
    $id_kategori    = $_POST['id_kategori'];
    $deskripsi      = $_POST['deskripsi'];
    $rating         = $_POST['rating'];

    // Upload gambar
    $gambar = '';

    if (!empty($_FILES['gambar']['name'])) {

        $gambar = time() . '_' . $_FILES['gambar']['name'];

        move_uploaded_file(
            $_FILES['gambar']['tmp_name'],
            $_SERVER['DOCUMENT_ROOT'] . '/tanah_blambangan/assetsWeb/' . $gambar
        );
    }

    // ======================
    // UPDATE DATA
    // ======================

    if ($id) {

        $cek = mysqli_query(
            $koneksi,
            "SELECT * FROM destinasi_produk WHERE id_destinasi='$id'"
        );

        if (mysqli_num_rows($cek) > 0) {

            $query = "
                UPDATE destinasi_produk
                SET
                    nama_destinasi = '$nama',
                    lokasi = '$lokasi',
                    id_kategori = '$id_kategori',
                    deskripsi = '$deskripsi',
                    rating = '$rating'
            ";

            // jika upload gambar baru
            if (!empty($gambar)) {
                $query .= ", gambar = '$gambar'";
            }

            $query .= " WHERE id_destinasi = '$id'";

        } else {

            // ======================
            // INSERT DATA
            // ======================

            $query = "
                INSERT INTO destinasi_produk
                (
                    id_destinasi,
                    nama_destinasi,
                    lokasi,
                    id_kategori,
                    deskripsi,
                    rating,
                    gambar
                )
                VALUES
                (
                    '$id',
                    '$nama',
                    '$lokasi',
                    '$id_kategori',
                    '$deskripsi',
                    '$rating',
                    '$gambar'
                )
            ";
        }

    } else {

        // INSERT jika id kosong

        $query = "
            INSERT INTO destinasi_produk
            (
                nama_destinasi,
                lokasi,
                id_kategori,
                deskripsi,
                rating,
                gambar
            )
            VALUES
            (
                '$nama',
                '$lokasi',
                '$id_kategori',
                '$deskripsi',
                '$rating',
                '$gambar'
            )
        ";
    }

    mysqli_query($koneksi, $query);

    header("Location: ../index.php");
    exit;
}

// ======================
// HAPUS DATA
// ======================

if (isset($_GET['hapus'])) {

    $id = $_GET['hapus'];

    mysqli_query(
        $koneksi,
        "DELETE FROM destinasi_produk WHERE id_destinasi='$id'"
    );

    header("Location: ../index.php");
    exit;
}
?>