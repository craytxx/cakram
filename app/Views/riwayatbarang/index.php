<?= $this->extend('/template'); ?>
<?= $this->section('content'); ?>
<div class='container'>
    <div class='row'>
        <div class="col">
            <h3 class="text-center"><b>Daftar Riwayat Barang</b></h3>
            <hr>
            <a href="/riwayatbarang/cetak" class="btn btn-success"><i class="fa-solid fa-print"></i> Cetak Data</a>
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
                        <th scope="col">Size</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Kode Supplier</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1 + (5 * ($currentPage - 1));
                    foreach ($riwayatbarang as $p) :
                    ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $p['kode_barang']; ?></td>
                            <td><?= $p['nama']; ?></td>
                            <td><?= $p['size']; ?></td>
                            <td><?= 'Rp ' . number_format($p['harga'], 0, ',', '.'); ?></td>
                            <td><?= $p['kode_supplier']; ?></td>
                            <td><?= date_format(date_create($p['waktu']), 'd-m-Y H:i:s'); ?></td>
                            <td><?= $p['status']; ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <!-- ?= $pager->links('riwayatbarang', 'riwayatbarang_pagination'); ?> -->
        </div>
    </div>
</div>
<br><br>
<?= $this->endSection(); ?>