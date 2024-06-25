<?= $this->extend('/template'); ?>
<?= $this->section('content'); ?>
<div class='container'>
    <div class='row'>
        <div class="col">
            <h3 class="text-center"><b>Daftar Jasa</b></h3>
            <hr>
            <a href="/jasa/tambah" class="btn btn-primary"><i class="fa-solid fa-square-plus"></i> Tambah Jasa</a>
            <a href="/jasa/cetak" class="btn btn-success"><i class="fa-solid fa-print"></i> Cetak Data</a>
            <hr>
            <!-- flashdata dengan alert -->
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>

            <table class="table table-bordered table-hover mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Jasa</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1 + (5 * ($currentPage - 1));
                    foreach ($jasa as $p) :
                    ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $p['kode_jasa']; ?></td>
                            <td><?= $p['nama']; ?></td>
                            <td><?= 'Rp ' . number_format($p['harga'], 0, ',', '.'); ?></td>
                            <td><a href="/jasa/ubah/<?= $p['kode_jasa']; ?>" class="btn btn-warning">Edit</a>
                            
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $p['kode_jasa']; ?>">
                                Hapus
                            </button>
                            <div class="modal fade" id="hapusModal<?= $p['kode_jasa']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Rill ga min hapus data <strong><?= $p['nama']; ?></strong>? Bakal Ilang Lhoo Min!!
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <form action="/jasa/hapus/<?= $p['kode_jasa']; ?>" method="post" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <!-- ?= $pager->links('jasa', 'jasa_pagination'); ?> -->
        </div>
    </div>
</div>
<?= $this->endSection(); ?>