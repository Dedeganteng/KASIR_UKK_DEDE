<?php
session_start();
include '../../koneksi.php';

// ambil data dari form
$id_produk = htmlspecialchars($_POST['id_produk']);
$jumlah = htmlspecialchars($_POST['jumlah']);
$id_user = $_SESSION['id_user'];

// ambil data dari DB untuk orderan
$query_order = mysqli_query($kon, "SELECT count(id_order) as no_order FROM tb_order");
$order = mysqli_fetch_assoc($query_order);
$no_order = $order['no_order'] + 1;
$a_no = 'ORD000' . $no_order;

// ambil data dari DB untuk makanan
$query_produk = mysqli_query($kon, "SELECT * FROM tb_produk WHERE id_produk = '$id_produk'");
$harga = mysqli_fetch_assoc($query_produk);
$hartot = $harga['harga_produk'] * $jumlah;
// validasi jika ada makanan yang duplikat
$validasi_dupllikat_menu = mysqli_query($kon, "SELECT * FROM tb_detail_order WHERE id_produk = '$id_produk'");
$q_validasi = mysqli_fetch_assoc($validasi_dupllikat_menu);

// cek 
if ($q_validasi > 0) {
    // Jika produk sudah ada, perbarui jumlahnya
    $jumlah_baru = $q_validasi['jumlah'] + $jumlah;
    $hartot_baru = $harga['harga_produk'] * $jumlah_baru;
    $queryUpdate = "UPDATE tb_detail_order SET jumlah = '$jumlah_baru', hartot = '$hartot_baru' WHERE id_produk = '$id_produk'";
    $query = mysqli_query($kon, $queryUpdate);
} else {
    // Jika produk belum ada, tambahkan ke tabel
    $queryTambah = "INSERT INTO tb_detail_order VALUES(NULL, '$no_order', '$a_no', '$id_produk', '$jumlah', '$hartot', '$id_user', 0)";
    $query = mysqli_query($kon, $queryTambah);
}

if ($query > 0) {
    header("location:../index.php");
} else {
    header("location:../index.php");
}
