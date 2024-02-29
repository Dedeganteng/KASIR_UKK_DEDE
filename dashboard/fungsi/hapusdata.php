<?php
session_start();
include '../../koneksi.php';

// Cek apakah ada ID pelanggan yang dikirimkan melalui URL
if (isset($_GET['id'])) {
    $id_pelanggan = $_GET['id'];

    // Query untuk menghapus data pelanggan berdasarkan ID
    $query = "DELETE FROM tb_pelanggan WHERE id_pelanggan='$id_pelanggan'";

    // Eksekusi query
    if (mysqli_query($kon, $query)) {
        // Jika berhasil, redirect ke halaman data pelanggan dengan pesan sukses
        $_SESSION['pesan'] = "";
        header('location:../index.php?pelanggan');
    } else {
        // Jika gagal, redirect ke halaman data pelanggan dengan pesan error
        $_SESSION['pesan'] = "" . mysqli_error($kon);
        header('location:../index.php?pelanggan');
    }
    exit();
} else {
    // Jika ID tidak ditemukan, redirect ke halaman data pelanggan
    header('location:../index.php?pelanggan');
    exit();
}
?>
