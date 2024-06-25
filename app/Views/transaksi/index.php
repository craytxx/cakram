<?= $this->extend('/template'); ?>
<?= $this->section('content'); ?>
<div class='container'>
    <div class='row'>
        <div class="col">
            <h3 class="text-center"><b>Daftar Transaksi</b></h3>
            <hr>
            <a href="/transaksi/tambah" class="btn btn-primary"><i class="fa-solid fa-square-plus"></i> Tambah Transaksi</a>
            <a href="/transaksi/cetakAll" class="btn btn-success"><i class="fa-solid fa-file-pdf"></i> Cetak Laporan Transaksi</a>
            <br>
            <br>
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
                        <th scope="col">Nama</th>
                        <th scope="col">Kode Barang</th>
                        <th scope="col">Kode Jasa</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jumlah Barang</th>
                        <th scope="col">Jumlah Uang</th>
                        <th scope="col">Total Bill</th>
                        <th scope="col">Kembalian</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1 + (5 * ($currentPage - 1));
                    foreach ($transaksi as $t) :
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
                            <!-- <td><a href="/transaksi/index/?= $t['no_fak']; ?>" class="btn btn-warning">Detail</a></td> -->
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <?= $pager->links('transaksi', 'transaksi_pagination'); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>