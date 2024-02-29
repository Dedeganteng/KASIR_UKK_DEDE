<?php
session_start();
include '../../koneksi.php';

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $meja_id = $_POST['meja_id'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $status = isset($_POST['status']) ? $_POST['status'] : 0;

    // Query untuk update data pelanggan
    $query = "UPDATE tb_pelanggan SET nama_pelanggan='$nama_pelanggan', alamat='$alamat', telepon='$telepon', status='$status' WHERE meja_id='$meja_id'";

    // Eksekusi query
    if (mysqli_query($kon, $query)) {
        // Jika berhasil, redirect ke halaman data pelanggan dengan pesan sukses
        $_SESSION['pesan'] = "Data pelanggan berhasil diupdate";
        header('location:../index.php?pelanggan');
    } else {
        // Jika gagal, redirect ke halaman data pelanggan dengan pesan error
        $_SESSION['pesan'] = "Gagal mengupdate data pelanggan: " . mysqli_error($kon);
        header('location:../index.php?pelanggan');
    }
    exit();
}

// Cek apakah ada ID pelanggan yang dikirimkan melalui URL
if (isset($_GET['id'])) {
    $meja_id = $_GET['id'];

    // Query untuk mengambil data pelanggan berdasarkan ID
    $query = mysqli_query($kon, "SELECT * FROM tb_pelanggan WHERE meja_id='$meja_id'");
    $data = mysqli_fetch_assoc($query);

    // Jika data tidak ditemukan, redirect ke halaman data pelanggan dengan pesan error
    if (!$data) {
        $_SESSION['pesan'] = "Data pelanggan tidak ditemukan";
        header('location:../index.php?pelanggan');
        exit();
    }
} else {
    // Jika ID tidak ditemukan, redirect ke halaman data pelanggan
    header('location:../index.php?pelanggan');
    exit();
}
?>
