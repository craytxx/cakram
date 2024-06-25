<?= $this->extend('/template'); ?>
<?= $this->section('content'); ?>
<div class='container'>
    <div class='row'>
        <div class="col">
            <h3 class="text-center"><b>Daftar Riwayat Transaksi</b></h3>
            <hr>
            <a href="/riwayattrans/cetak" class="btn btn-success"><i class="fa-solid fa-print"></i> Cetak Data</a>
            <hr>
            <!-- flashdata dengan alert -->
            <?php if (session()->getFlashdata('pesan')): ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>

            <table class="table table-bordered table-hover mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">No Faktur</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kode Barang</th>
                        <th scope="col">Kode Jasa</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jumlah Barang</th>
                        <th scope="col">Jumlah Uang</th>
                        <th scope="col">Total Bill</th>
                        <th scope="col">Kembalian</th>
                        <th scope="col">Waktu Transaksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1 + (5 * ($currentPage - 1));
                    foreach ($riwayattrans as $t):
                        ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $t['no_fak']; ?></td>
                            <td><?= $t['nama']; ?></td>
                            <td><?= $t['kode_barang']; ?></td>
                            <td><?= $t['kode_jasa']; ?></td>
                            <td><?= date('d-m-Y', strtotime($t['tgl'])); ?></td>
                            <td><?= $t['jumlah_brg']; ?></td>
                            <td><?= 'Rp ' . number_format($t['jumlah_uang'], 0, ',', '.'); ?></td>
                            <td><?= 'Rp ' . number_format($t['total_bill'], 0, ',', '.'); ?></td>
                            <td><?= 'Rp ' . number_format($t['kembalian'], 0, ',', '.'); ?></td>
                            <td><?= date_format(date_create($t['waktu_trans']), 'd-m-Y H:i:s'); ?></td>

                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <!-- ?= $pager->links('barang', 'barang_pagination'); ?> -->
        </div>
    </div>
</div>
<?= $this->endSection(); ?>