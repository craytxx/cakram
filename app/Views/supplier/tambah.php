<?= $this->extend('/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Form Tambah Data Supplier</h3>
            </div>
            <div class="card-body">
                <form action="/supplier/simpan" method="post">
                    <?= csrf_field(); ?>

                    <div class="mb-3 row">
                        <label for="kode_supplier" class="col-sm-2 col-form-label">Kode Supplier</label>
                        <div class="col-sm-6">
                            <input type="text"
                                class="form-control <?= array_key_exists('kode_supplier', $error) ? 'is-invalid' : ''; ?>"
                                id="kode_supplier" name="kode_supplier" value="<?= set_value('kode_supplier'); ?>">
                            <div id="kode_supplierFeedback" class="invalid-feedback">
                                <?= array_key_exists('kode_supplier', $error) ? $error['kode_supplier'] : ''; ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="alamat" name="alamat">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="telp" class="col-sm-2 col-form-label">Telp</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="telp" name="telp">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-6 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                            <a href="<?= base_url('/supplier'); ?>" class="btn btn-secondary"><i
                                    class="fa-solid fa-left-long"></i> Kembali</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>