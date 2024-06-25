<?= $this->extend('/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Form Tambah Data Jasa</h3>
            </div>
            <div class="card-body">
                <form action="/jasa/simpan" method="post">
                    <?= csrf_field(); ?>

                    <div class="mb-3 row">
                        <label for="kode_jasa" class="col-sm-2 col-form-label">Kode Jasa</label>
                        <div class="col-sm-6">
                            <input type="text"
                                class="form-control <?= array_key_exists('kode_jasa', $error) ? 'is-invalid' : ''; ?>"
                                id="kode_jasa" name="kode_jasa" value="<?= set_value('kode_jasa'); ?>">
                            <div id="kode_jasaFeedback" class="invalid-feedback">
                                <?= array_key_exists('kode_jasa', $error) ? $error['kode_jasa'] : ''; ?>
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
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="harga" name="harga">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-6 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                            <a href="<?= base_url('/jasa'); ?>" class="btn btn-secondary"><i
                                    class="fa-solid fa-left-long"></i> Kembali</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>