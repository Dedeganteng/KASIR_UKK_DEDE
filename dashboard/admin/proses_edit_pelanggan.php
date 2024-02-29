<?php
include '../../koneksi.php'; // Sesuaikan path ke file koneksi Anda
$id_pelanggan = $_GET['ubah_pelanggan'];

// Mengambil data pelanggan dari database
$query = mysqli_query($kon, "SELECT * FROM tb_pelanggan WHERE id_pelanggan = '$id_pelanggan'");
$pelanggan = mysqli_fetch_assoc($query);
?>

<form action="proses_edit_pelanggan.php" method="post">
    <input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan'] ?>">
    <div>
        <label>Nama Pelanggan:</label>
        <input type="text" name="nama_pelanggan" value="<?= $pelanggan['nama_pelanggan'] ?>">
    </div>
    <div>
        <label>Alamat:</label>
        <input type="text" name="alamat" value="<?= $pelanggan['alamat'] ?>">
    </div>
    <div>
        <label>Telepon:</label>
        <input type="text" name="telepon" value="<?= $pelanggan['telepon'] ?>">
    </div>
    <div>
        <label>Status:</label>
        <input type="checkbox" name="status" value="1" <?= $pelanggan['status'] ? 'checked' : '' ?>>
    </div>
    <button type="submit">Update</button>
</form>
