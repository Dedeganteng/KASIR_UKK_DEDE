<div class="container mt-3">
	<?php if (isset($_SESSION['pesan'])) : ?>
        <?= $_SESSION['pesan'] ?>
    <?php unset($_SESSION['pesan']); endif; ?>
	<div class="card">
		<div class="card-header">
			Data Pelanggan
		</div>
		<div class="card-body">
			<a href="index.php?registrasi_pelanggan"><button class="btn btn-primary btn-sm mb-3">Registrasi pelanggan</button></a>
			<table class="table table-bordered table-hover table-striped" id="tabel">
				<thead>
					<tr>
						<th>No</th>
                        <th>Id</th>
						<th>Nama Pelanggan</th>
						<th>Alamat</th>
						<th>Telepon</th>
						<th>Aksi</th>
						</tr>
				</thead>
				<tbody>
					<!-- mengambil data dari database -->
					<?php
					$i = 1;
					$sql = mysqli_query($kon, "SELECT * FROM tb_pelanggan");
					while ($data = mysqli_fetch_array($sql)) : ?>
					<tr>
						<td><?= $i++; ?></td>
						<td><?= $data['id_pelanggan'] ?></td>
						<td><?= $data['nama_pelanggan'] ?></td>
						<td><?= $data['alamat'] ?></td>
						<td><?= $data['telepon'] ?></td>
						<?php if ($_SESSION['level'] == "Admin"): ?>
						<td>
							<div class="btn-group">
								<a href="index.php?ubah_pelanggan=<?= $data['id_pelanggan'] ?>" class="btn btn-sm btn-warning">Ubah</a>
								<a href="fungsi/hapus_pelanggan.php?id_pelanggan=<?= $data['id_pelanggan']; ?>" class="btn btn-danger btn-sm">Hapus</a>
							</div>
						</td>
					<?php endif; ?>
					</tr>
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>