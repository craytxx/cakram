<?= $this->extend('/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Form Tambah Data Master Transaksi</h3>
            </div>
            <div class="card-body">
                <form action="/mastertrans/simpan" method="post">
                    <?= csrf_field(); ?>

                    <div class="mb-3 row">
                        <label for="no_fak" class="col-sm-2 col-form-label">No Faktur</label>
                        <div class="col-sm-6">
                            <input type="text"
                                class="form-control <?= array_key_exists('no_fak', $error) ? 'is-invalid' : ''; ?>"
                                id="no_fak" name="no_fak" value="<?= set_value('no_fak'); ?>">
                            <div id="no_fakFeedback" class="invalid-feedback">
                                <?= array_key_exists('no_fak', $error) ? $error['no_fak'] : ''; ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="tgl_trans" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" id="tgl_trans" name="tgl_trans" value="<?= date('Y-m-d'); ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tot_harga" class="col-sm-2 col-form-label">Total Harga</label>
                        <div class="col-sm-6">
                            <input readonly type="text" class="form-control" id="tot_harga" name="tot_harga">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-sm-6 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                            <a href="<?= base_url('/mastertrans'); ?>" class="btn btn-secondary"><i
                                    class="fa-solid fa-left-long"></i> Kembali</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>