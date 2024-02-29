<?php
error_reporting(0);
session_start();
require "../../koneksi.php";

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    // Update data pelanggan
    $query_update_pelanggan = "UPDATE tb_pelanggan SET nama_pelanggan='$nama_pelanggan', alamat='$alamat', telepon='$telepon' WHERE id_pelanggan='$id_pelanggan'";
    $sql_update_pelanggan = mysqli_query($kon, $query_update_pelanggan);

    if ($sql_update_pelanggan) {
        $_SESSION['pesan'] = '
        <div class="alert alert-success mb-2 alert-dismissible text-small" role="alert">
            <b>Berhasil!</b> Data pelanggan berhasil diubah
            <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">×</span></button>
        </div>
        ';
        header("location:../index.php?pelanggan");
    } else {
        $_SESSION['pesan'] = '
        <div class="alert alert-danger mb-2 alert-dismissible text-small" role="alert">
            <b>Gagal!</b> Data pelanggan gagal diubah
            <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">×</span></button>
        </div>
        ';
        header("location:../index.php?pelanggan");
    }
} else {
    // Jika form belum disubmit, ambil data dari database
    $id_pelanggan = $_GET['id_pelanggan'];
    $query_get_pelanggan = "SELECT * FROM tb_pelanggan WHERE id_pelanggan='$id_pelanggan'";
    $result_get_pelanggan = mysqli_query($kon, $query_get_pelanggan);
    $data_pelanggan = mysqli_fetch_assoc($result_get_pelanggan);
}
?>
