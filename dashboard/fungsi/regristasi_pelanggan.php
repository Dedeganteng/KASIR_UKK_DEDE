<?php  
session_start();
include '../../koneksi.php';

// ambil data dari form
$status = $_POST['status'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];

// query input data
$query = "INSERT INTO tb_pelanggan VALUES ( 0, '$nama_pelanggan', '$nama_pelanggan', '$alamat', '$telepon')";
$sql = mysqli_query($kon, $query);

// cek
if ($sql) {
	$_SESSION['pesan'] = '
		<div class="alert alert-success mb-2 alert-dismissible text-small " role="alert">
			<b>Berhasil!</b> Registrasi pelanggan berhasil
			<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
		</div>
	';
	header('location:../index.php?pelanggan');
} else {
	$_SESSION['pesan'] = '
		<div class="alert alert-danger mb-2 alert-dismissible text-small " role="alert">
			<b>Gagal!</b> Registrasi pelanggan gagal
			<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
		</div>
	';
	header('location:../index.php?pelanggan');
}
?>


