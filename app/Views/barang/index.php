<?= $this->extend('/template'); ?>
<?= $this->section('content'); ?>
<div class='container'>
    <div class='row'>
        <div class="col">
            <h3 class="text-center"><b>Daftar Barang</b></h3>
            <hr>
            <a href="/barang/tambah" class="btn btn-primary"><i class="fa-solid fa-square-plus"></i> Tambah Barang</a>
            <a href="/barang/cetak" class="btn btn-success"><i class="fa-solid fa-print"></i> Cetak Data</a>
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
                        <th scope="col">Kode Barang</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Size</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Kode Supplier</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1 + (5 * ($currentPage - 1));
                    foreach ($barang as $p) :
                    ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $p['kode_barang']; ?></td>
                            <td><?= $p['nama']; ?></td>
                            <td><?= $p['stok']; ?></td>
                            <td><?= $p['size']; ?></td>
                            <td><?= 'Rp ' . number_format($p['harga'], 0, ',', '.'); ?></td>
                            <td><?= $p['kode_supplier']; ?></td>
                            <td><a href="/barang/ubah/<?= $p['kode_barang']; ?>" class="btn btn-warning">Edit</a>
                            
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $p['kode_barang']; ?>">
                                Hapus
                            </button>
                            <div class="modal fade" id="hapusModal<?= $p['kode_barang']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <form action="/barang/hapus/<?= $p['kode_barang']; ?>" method="post" class="d-inline">
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
            <!-- ?= $pager->links('barang', 'barang_pagination'); ?> -->
        </div>
    </div>
</div>
<?= $this->endSection(); ?>