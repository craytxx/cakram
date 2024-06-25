<?= $this->extend('/template'); ?>
<?= $this->section('content'); ?>
<div class='container'>
    <div class='row'>
        <div class="col">
            <h3 class="text-center"><b>Daftar Master Transaksi</b></h3>
            <hr>
            <a href="/mastertrans/tambah" class="btn btn-primary"><i class="fa-solid fa-square-plus"></i> Tambah Master Transaksi</a>
            <a href="/mastertrans/cetak" class="btn btn-success"><i class="fa-solid fa-print"></i> Cetak Data</a>
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
                        <th scope="col">No Faktur</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1 + (5 * ($currentPage - 1));
                    foreach ($mastertrans as $p) :
                    ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $p['no_fak']; ?></td>
                            <td> <?= date_format(date_create($p['tgl_trans']), 'd-m-Y'); ?></td>
                            <td><?= 'Rp ' . number_format($p['tot_harga'], 0, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <!-- ?= $pager->links('barang', 'barang_pagination'); ?> -->
        </div>
    </div>
</div>
<?= $this->endSection(); ?>