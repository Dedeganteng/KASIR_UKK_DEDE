<?php
// menggunakan fungsi session_start() di awal file
session_start();

include '../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pelanggan = $_POST['id_pelanggan'];

    
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
// cek apakah key status ada di array $_POST
if (isset($_POST['status'])) {
    // jika ada, gunakan nilai yang dikirimkan
    $status = $_POST['status'];
} else {
    // jika tidak ada, berikan nilai default 0
    $status = 0;
}



$query = "INSERT INTO tb_pelanggan (status, nama_pelanggan, alamat, telepon) VALUES ('$status', '$nama_pelanggan','$alamat','$telepon')";


    if (mysqli_query($kon, $query)) {
        // jika data berhasil masuk, simpan pesan alert di variabel $_SESSION
        $_SESSION['alert'] = "Data pelanggan berhasil ditambahkan";
    } else {
        // jika data gagal masuk, simpan pesan alert di variabel $_SESSION
        $_SESSION['alert'] = "Gagal menambahkan data pelanggan: " . mysqli_error($kon);
    }
    // arahkan halaman ke index.php?user
    header('location:../index.php?pelanggan');
    // hentikan eksekusi kode selanjutnya
    exit();
}

?>
