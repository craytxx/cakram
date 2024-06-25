<?= $this->extend('/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="col">
        <h3 class="text-center">Form Ubah Supplier</h3>
        <hr>

        <form action="/supplier/update/<?= $supplier['kode_supplier']; ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="row mb-3">
                <label  for="kode_supplier" class="col-sm-2 col-form-label">Kode Supplier</label>
                <div class="col-sm-6">
                    <input readonly type="text" class="form-control" id="kode_supplier" name="kode_supplier"
                        value="<?= $supplier['kode_supplier']; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $supplier['nama']; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $supplier['alamat']; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="telp" class="col-sm-2 col-form-label">Telp</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="telp" name="telp" value="<?= $supplier['telp']; ?>">
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Ubah Data</button>
            <a href="<?= base_url('/supplier'); ?>" class="btn btn-secondary"><i class="fa-solid fa-left-long"></i> Kembali</a>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>