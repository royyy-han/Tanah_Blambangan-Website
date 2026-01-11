<?php
include '../../../config/koneksi.php';

// Simpan / Edit
if (isset($_POST['simpan'])) {
    $id = $_POST['id_destinasi'];
    $nama = $_POST['nama_destinasi'];
    $lokasi = $_POST['lokasi'];
    $deskripsi = $_POST['deskripsi'];
    $rating = $_POST['rating'];
    $id_kategori = $_POST['id_kategori'];

    // upload gambar jika ada
    $gambar = '';
    if (!empty($_FILES['gambar']['name'])) {
        $gambar = time() . '_' . $_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], "../../assets/" . $gambar);
    }

    if ($id) {
        // Update data
        $query = "UPDATE destinasi_produk 
                  SET nama_destinasi='$nama', lokasi='$lokasi', deskripsi='$deskripsi', 
                      rating='$rating', id_kategori='$id_kategori'";

        if ($gambar) {
            $query .= ", gambar='$gambar'";
        }

        $query .= " WHERE id_destinasi='$id'";
    } else {
        // Insert data baru
        $query = "INSERT INTO destinasi_produk (nama_destinasi, lokasi, deskripsi, rating, gambar, id_kategori)
                  VALUES ('$nama','$lokasi','$deskripsi','$rating','$gambar','$id_kategori')";
    }

    mysqli_query($koneksi, $query);
    header("Location: ../index.php");
    exit;
}

// Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM destinasi_produk WHERE id_destinasi='$id'");
    header("Location: ../index.php");
    exit;
}
?>
