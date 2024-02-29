<form action="fungsi/editpelanggan.php" method="POST">
    <div class="form-group">
        <label for="id_pelanggan">ID Pelanggan</label>
        <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" value="<?= $data['id_pelanggan'] ?>" readonly>
    </div>
    <div class="form-group">
        <label for="nama_pelanggan">Nama Pelanggan</label>
        <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="<?= $data['nama_pelanggan'] ?>" required>
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['alamat'] ?>" required>
    </div>
    <div class="form-group">
        <label for="telepon">No Telepon</label>
        <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $data['telepon'] ?>" required>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" id="status" name="status">
            <option value="1" <?= $data['status'] == 1 ? 'selected' : '' ?>>Aktif</option>
            <option value="0" <?= $data['status'] == 0 ? 'selected' : '' ?>>Tidak Aktif</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
