<?= $this->extend('/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="col">
        <h3 class="text-center">Form Ubah Jasa</h3>
        <hr>

        <form action="/jasa/update/<?= $jasa['kode_jasa']; ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="row mb-3">
                <label  for="kode_jasa" class="col-sm-2 col-form-label">Kode Jasa</label>
                <div class="col-sm-6">
                    <input readonly type="text" class="form-control" id="kode_jasa" name="kode_jasa"
                        value="<?= $jasa['kode_jasa']; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $jasa['nama']; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="harga" name="harga" value="<?= $jasa['harga']; ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Ubah Data</button>
            <a href="<?= base_url('/jasa'); ?>" class="btn btn-secondary"><i class="fa-solid fa-left-long"></i> Kembali</a>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>