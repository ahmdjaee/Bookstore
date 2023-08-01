<form action="<?= base_url('pages/update_penerbit'); ?>" method="POST">
    <div class="card">
        <div class="card-body">
            <h1>
                <center>Edit Penerbit</center>
            </h1>
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Nama Penerbit" name="namapenerbit"
                        value="<?= $data_penerbit['nama_penerbit']; ?>">
                    <input type="hidden" name="kodepenerbit" value="<?= $data_penerbit['kode_penerbit']; ?>">
                    <label for="floatingInput">Nama Penerbit</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Alamat Penerbit" name="alamatpenerbit"
                        value="<?= $data_penerbit['alamat_penerbit']; ?>">
                    <label for="floatingInput">Alamat Penerbit</label>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" style="margin-right:10px"
                    onclick="history.back()">Kembali</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
</form>