<?php
session_start();
include '../../koneksi.php'; // Menghubungkan dengan database

// Mengambil ID pelanggan dari URL
$id_pelanggan = $_GET['id'];

// Mengambil data pelanggan dari database
$query = mysqli_query($kon, "SELECT * FROM tb_pelanggan WHERE id_pelanggan = '$id_pelanggan'");
$pelanggan = mysqli_fetch_assoc($query);
?>

<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            Edit Data Pelanggan
        </div>

        <div class="card-body">
            <form action="update_pelanggan.php" method="post">
                <input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan'] ?>">
                <div class="form-group">
                    <label>Nama Pelanggan</label>
                    <input type="text" class="form-control" name="nama_pelanggan" value="<?= $pelanggan['nama_pelanggan'] ?>">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="<?= $pelanggan['alamat'] ?>">
                </div>
                <div class="form-group">
                    <label>No Telepon</label>
                    <input type="text" class="form-control" name="telepon" value="<?= $pelanggan['telepon'] ?>">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
