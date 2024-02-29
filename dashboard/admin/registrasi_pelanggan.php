<div class="container mt-3">
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
		  		<div class="card-header">
		  			<h5><strong>Registrasi Pelanggan</strong></h5>
		  		</div>
			  	<div class="card-body">
			  		<form action="fungsi/regristasi_pelanggan.php" method="post"> <!-- Perbaikan pada bagian action form -->
				  		<div class="form-group">
				  			<label class="form-label" for="nama_pelanggan">Nama Lengkap</label>
				  			<input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required> <!-- Menambahkan atribut required -->
				  		</div>
				  		<div class="form-group">
				  			<label class="form-label" for="alamat">Alamat</label> <!-- Memperbaiki penulisan Alamat -->
				  			<input type="text" class="form-control" id="alamat" name="alamat" required> <!-- Menambahkan atribut required -->
				  		</div>
				  		<div class="form-group">
				  			<label class="form-label" for="telepon">Telepon</label> <!-- Memperbaiki penulisan Telepon -->
				  			<input type="text" class="form-control" id="telepon" name="telepon" required> <!-- Menambahkan atribut required -->
				  		</div>
				  		
				  		<button type="submit" class="btn btn-primary">Submit</button>
				  		<button type="button" class="btn btn-danger" onclick="history.back()">Kembali</button>
			  		</form>
			  	</div>
			</div>
			
		</div>
	</div>
</div>