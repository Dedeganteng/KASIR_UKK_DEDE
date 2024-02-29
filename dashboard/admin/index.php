<div class="container mt-3">
  <?php if (isset($_SESSION['pesan'])) : ?>
        <?= $_SESSION['pesan'] ?>
    <?php unset($_SESSION['pesan']); endif; ?>
    <div class="card mb-3">
    <h1>
      <b>TEFA RPL</b>
    </h1>
      <div class="card-body">
          <h3 class="card-title">Silahkan Pilih Produk Yang Tersedia</h3>

      </div>
      
    </div>
    <h3 class="mb-3">produk</h3>
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <!-- mengambil data dari database -->
          <?php
            $query = "SELECT * FROM tb_produk WHERE kategori='Makanan' ORDER BY id_produk LIMIT 7";
            $sql = mysqli_query($kon, $query);
            while($data = mysqli_fetch_array($sql)) :
          ?>
          <div class="col-lg-3 mb-3">
    <div class="card">
        <img style="width: 200px; height:200px;" class="card-img-top" src="assets/image/makanan/<?= $data['foto'] ?>" alt="Card image cap">
        <div class="card-body">
            <div class="mb-1">
                <?php
                if ($data['stok'] == 0) {
                    echo '<span class="badge badge-danger">Tidak Tersedia</span>';
                } else {
                    echo '<span class="badge badge-success">Tersedia</span>';
                }
                ?>
                <span class="badge badge-primary">Stok <?= $data['stok'] ?></span>
            </div>
            <h4 class="card-title"><?= $data['nama_produk'] ?></h4>
            <?php
            $harga = $data['harga_produk'];
            if ($_SESSION['level'] == "") {
                $harga = $data['harga_produk'] + 5000;
            }
            ?>

            <p class="card-text"><strong>Rp. <?= rupiah($harga) ?></strong></p>
            <?php if ($data['status_produk'] == 1): ?>
                <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#produk_<?= $data['id_produk']; ?>" <?= $data['stok'] == 0 ? 'disabled' : '' ?>>
                    Beli
                </button>
            <?php else: ?>
                <a href="index.php?tambah=<?= $data['id_produk'] ?>" class="btn btn-primary btn-sm btn-block disabled">Beli</a>
            <?php endif; ?>
        </div>
    </div>
</div>


          <!-- Modal -->
          <div class="modal fade" id="produk_<?= $data['id_produk']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah ke Keranjang</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="fungsi/orderMakanan.php" method="POST">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-6">
                        <img src="assets/image/makanan/<?= $data['foto'] ?>" alt="" class="card-img-top">
                      </div>
                      <div class="col-md-6">
                        <input type="hidden" name="id_produk" value="<?= $data['id_produk'] ?>">
                        <div class="form-group">
                          <label>Menu</label>
                          <input type="text" readonly class="form-control" value="<?= $data['nama_produk'] ?>">
                        </div>
                        <div class="form-group">
                          <label>Harga</label>
                          <input type="text" readonly class="form-control" value="<?= $data['harga_produk'] ?>">
                        </div>
                        <div class="form-group">
                          <label>Jumlah Pesanan</label>
                          <input type="number" class="form-control" name="jumlah" value="1" min="1" max="20">
                        </div>
                        
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <?php endwhile; ?>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <?php
            $query2 = "SELECT * FROM tb_produk WHERE kategori='Minuman' ORDER BY id_produk";
            $sql2 = mysqli_query($kon, $query2);
            while($data = mysqli_fetch_array($sql2)) :
          ?>
          <div class="col-lg-3 mb-3">
            <div class="card">
              <img class="card-img-top" src="assets/image/makanan/<?= $data['foto'] ?>" alt="Card image cap">
              <div class="card-body">
                <div class="mb-1">
                  <?php if ($data['status_produk']==1): ?>
                    <span class="badge badge-success">Tersedia</span>
                  <?php else: ?>
                    <span class="badge badge-danger">Tidak Tersedia</span>
                  <?php endif; ?>
                  
                </div>
                  <h4 class="card-title"><?= $data['nama_produk'] ?></h4>
                  <?php 
                    $hargi = $data['harga_produk'];
                    if ($_SESSION['level']=="") {
                        $hargi = $data['harga_produk']+3000;
                    }
                  ?>
                  <p class="card-text"><strong>Rp. <?= rupiah($hargi) ?></strong></p>
                  <?php if ($data['status_produk']==1): ?>
                    <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#produk_<?= $data['id_produk']; ?>">
                      Beli
                    </button>
                  <?php else: ?>
                    <a href="index.php?tambah=<?= $data['id_produk'] ?>" class="btn btn-primary btn-block disabled">Beli</a>
                  <?php endif; ?>
              </div>
            </div>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="produk_<?= $data['id_produk']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah ke Keranjang</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="fungsi/orderMakanan.php" method="POST">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-6">
                        <img src="assets/image/makanan/<?= $data['foto'] ?>" alt="" class="card-img-top">
                      </div>
                      <div class="col-md-6">
                        <input type="hidden" name="id_produk" value="<?= $data['id_produk'] ?>">
                        <div class="form-group">
                          <label>Menu</label>
                          <input type="text" readonly class="form-control" value="<?= $data['nama_produk'] ?>">
                        </div>
                        <div class="form-group">
                          <label>Harga</label>
                          <input type="text" readonly class="form-control" value="<?= $data['harga_produk'] ?>">
                        </div>
                        <div class="form-group">
                          <label>Jumlah Pesanan</label>
                          <input type="number" class="form-control" name="jumlah" value="1" min="1" max="20">
                        </div>
                        
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <?php endwhile; ?>
        </div>
      </div>
    </div>

</div>