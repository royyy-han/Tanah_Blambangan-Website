<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/tanah_blambangan/config/koneksi.php';

$database = new Database();
$koneksi = $database->getConnection();

// ambil data jika edit
$id = $_GET['id'] ?? null;
$data = [
    'nama_destinasi' => '',
    'lokasi' => '',
    'deskripsi' => '',
    'rating' => '',
    'gambar' => '',
    'id_kategori' => ''
];

if ($id) {
    $query = mysqli_query($koneksi, "SELECT * FROM destinasi_produk WHERE id_destinasi = $id");
    $data = mysqli_fetch_assoc($query);
}
// ambil kategori untuk dropdown
$kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
?>

<div class="container mt-4">
    <h4><?= $id ? 'Edit' : 'Tambah' ?> Destinasi</h4>

    <form action="/tanah_blambangan/page/admin/admin-page/proses.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_destinasi" value="<?= $data['id_destinasi'] ?? '' ?>">

        <div class="mb-3">
            <label>Nama Destinasi</label>
            <input type="text" name="nama_destinasi" class="form-control" required
                   value="<?= $data['nama_destinasi']; ?>">
        </div>

        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control" required
                   value="<?= $data['lokasi']; ?>">
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="id_kategori" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                <?php while ($k = mysqli_fetch_assoc($kategori)) { ?>
                    <option value="<?= $k['id_kategori']; ?>" 
                        <?= ($k['id_kategori'] == $data['id_kategori']) ? 'selected' : ''; ?>>
                        <?= $k['nama_kategori']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3"><?= $data['deskripsi']; ?></textarea>
        </div>

        <div class="mb-3">
            <label>Rating</label>
            <input type="number" step="0.1" name="rating" class="form-control" value="<?= $data['rating']; ?>">
        </div>

        <div class="mb-3">
            <label>Upload Gambar</label><br>
            <?php if ($data['gambar']) { ?>
                <img src="../../assets/<?= $data['gambar']; ?>" width="120"><br><br>
            <?php } ?>
            <input type="file" name="gambar" class="form-control">
        </div>

        <button type="submit" 
                name="simpan" 
                class="btn btn-success">
            Simpan
        </button>

        <a href="index.php" 
           class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>