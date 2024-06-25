<?= $this->extend('/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h3>Detail Pulsa</h3>
            <div class="card mb-3" style="max-width: 530px;">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card_title"><?= $pulsa['kode_pulsa']; ?></h5>
                            <p class="card-text"><b>Provider:
                                    <?= $pulsa['provider']; ?></b></p>
                            <p class="card-text">Nominal Pulsa:
                                <?= $pulsa['nominal_pulsa']; ?></p>
                            <p class="card-text">Harga Jual:
                                <?= $pulsa['harga_jual']; ?></p>
                            <p class="card-text">Kategori Pulsa:
                                <?= $pulsa['kategori_pulsa']; ?></p>
                            <p class="card-text">Keterangan Pulsa:
                                <?= $pulsa['ket_pulsa']; ?></p>
                            <a href="/pulsa/ubah/<?= $pulsa['kode_pulsa']; ?>" class="btn btn-warning">Ubah</a>
                            <td>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $pulsa['kode_pulsa']; ?>">
                                    Hapus
                                </button>

                                <div class="modal fade" id="hapusModal<?= $pulsa['kode_pulsa']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">KONFIRMASI</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin ingin menghapus data pulsa dengan Kode Pulsa: <strong><?= $pulsa['kode_pulsa']; ?></strong>? Data Pulsa Anda akan Hilang!!
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <form action="/pulsa/hapus/<?= $pulsa['kode_pulsa']; ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>