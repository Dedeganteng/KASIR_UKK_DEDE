<?php
session_start();
require '../../koneksi.php';

$id_pelanggan = $_GET['id_pelanggan'];
$hapus_pelanggan = "DELETE FROM tb_pelanggan WHERE id_pelanggan = '$id_pelanggan'";
$query = mysqli_query($kon, $hapus_pelanggan);
if ($query) {
    $_SESSION['pesan'] = '
		<div class="alert alert-success mb-2 alert-dismissible text-small " role="alert">
			<b>Berhasil!</b> Pelanggan berhasil dihapus
			<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
		</div>
	';
	header('location:../admin/data_pelanggan.php');
} else {
    $_SESSION['pesan'] = '
		<div class="alert alert-danger mb-2 alert-dismissible text-small " role="alert">
			<b>Gagal!</b> Pelanggan gagal dihapus
			<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
		</div>
	';
	header('location:../admin/data_pelanggan.php');
}
?>
