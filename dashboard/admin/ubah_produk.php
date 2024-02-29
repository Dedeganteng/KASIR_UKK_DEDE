<?php
$id = $_GET['ubah_makanan'];
$query = "SELECT * FROM tb_produk WHERE id_produk='$id'";
$sql = mysqli_query($kon, $query);
$data = mysqli_fetch_array($sql);

if ($data['kategori']=="Makanan") {
	$kategori = "Makanan";
} else {
	$kategori = "Minuman";
}
?>
<div class="container mt-3">
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
		  		<div class="card-header">
		  			<strong>Ubah <?= $kategori; ?></strong>
		  		</div>
			  	<div class="card-body">
			  		<form action="fungsi/ubahMakanan.php?id_produk=<?= $data['id_produk'] ?>" method="post" enctype="multipart/form-data">
				  		<div class="form-group">
				  			<label class="form-label" for="kategori">Kategori</label>
				  			<select name="kategori" id="kategori" class="form-control">
								<?php  
									if ($data['kategori']=="Makanan") {
										$selected = "Selected";
									} elseif ($data['kategori']=="Minuman") {
										$select = "Selected";
									}
								?>
				  				<option value="Makanan" <?= $selected; ?>>Makanan</option>
				  				<option value="Minuman" <?= $select; ?>>Minuman</option>
				  			</select>
				  		</div>
				  		<div class="form-group">
				  			<label class="form-label" for="nama_produk">Nama <?= $kategori; ?></label>
				  			<input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= $data['nama_produk'] ?>">
				  		</div>
				  		<div class="form-group">
				  			<label class="form-label" for="harga_produk">Harga</label>	
				  			<input type="number" class="form-control" id="harga_produk" name="harga_produk" min="0" value="<?= $data['harga_produk'] ?>">
				  		</div>
						  <div class="form-group">
                            <label class="form-label" for="stok">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok" min="0">
                        </div>
				  		<div class="form-group">
				  			<label class="form-label" for="foto">Foto</label>
				  			<div class="row">
				  				<div class="col-md-4">
									<img src="assets/image/makanan/<?= $data['foto'] ?>" alt="makanan" class="img-thumbnail">
				  				</div>
				  				<div class="col-md-8">
				  					<div class="input-group mb-3">
									  	<div class="input-group-prepend">
									      	<div class="input-group-text">
      											<input type="checkbox" name="ubah_foto">
    										</div>
									  	</div>
						  				<div class="custom-file">
			    							<label class="custom-file-label" for="foto">Choose file</label>
											<input type="file" class="custom-file-input" id="foto" name="foto">
			  							</div>
									</div>
									<span class="help-block text-muted">Ceklis jika Anda ingin mengubah foto</span>
				  				</div>
				  			</div>
				  		</div>
				  		<button type="submit" class="btn btn-primary">Submit</button>
				  		<button type="button" class="btn btn-danger" onclick="history.back()">Kembali</button>
			  		</form>
			  	</div>
			</div>
			
		</div>
	</div>
</div>
