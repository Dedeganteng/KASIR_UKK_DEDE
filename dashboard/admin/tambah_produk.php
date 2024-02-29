<div class="container mt-3">
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
		  		<div class="card-header">
		  			<strong>Tambah Produk</strong>
		  		</div>
			  	<div class="card-body">
			  		<form action="fungsi/tambahMakanan.php" method="post" enctype="multipart/form-data">
				  		<div class="form-group">
				  			<label class="form-label" for="kategori">Kategori </label>
				  			<select name="kategori" id="kategori" class="form-control">
				  				<option value="Makanan">Produk</option>
				  			</select>
				  		</div>
				  		<div class="form-group">
				  			<label class="form-label" for="nama_produk">Nama Produk</label>
				  			<input type="text" class="form-control" id="nama_produk" name="nama_produk">
				  		</div>
				  		<div class="form-group">
				  			<label class="form-label" for="harga_produk">Harga</label>
				  			<input type="number" class="form-control" id="harga_produk" name="harga_produk" min="0">
				  		</div>
                        <div class="form-group">
                            <label class="form-label" for="stok">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok" min="0">
                        </div>

				  		<div class="form-group">
				  			<label class="form-label" for="foto">Foto</label>
			  				<div class="custom-file">
    							<label class="custom-file-label" for="foto">Pilih file</label>
    							<input type="file" class="custom-file-input" id="foto" name="foto" required>
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
