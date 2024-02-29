<?php
include '../../koneksi.php'; // Sesuaikan path ke file koneksi Anda
$id_pelanggan = $_GET['ubah_pelanggan'];

// Mengambil data pelanggan dari database
$query = mysqli_query($kon, "SELECT * FROM tb_pelanggan WHERE id_pelanggan = '$id_pelanggan'");
$pelanggan = mysqli_fetch_assoc($query);
?>

<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <strong>Ubah Pelanggan</strong>
                </div>
                <div class="card-body">
                    <form action="fungsi/ubah_pelanggan.php" method="post">
                        <input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan'] ?>">
                        <div class="form-group">
                            <label for="nama_pelanggan">Nama Pelanggan:</label>
                            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="<?= $pelanggan['nama_pelanggan'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat:</label>
                            <textarea class="form-control" id="alamat" name="alamat"><?= $pelanggan['alamat'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="telepon">Telepon:</label>
                            <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $pelanggan['telepon'] ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>