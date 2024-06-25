<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>
<div class='container'>
    <div class='row'>
        <div class="col-md-8 mx-auto">
            <div class="card mt-4">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title text-center">Detail Transaksi Nota</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered mt-3">
                        <tr>
                            <th scope="col">No Transaksi</th>
                            <td><?= $transaksi['no_trans']; ?></td>
                        </tr>
                        <tr>
                            <th scope="col">Nomor HP</th>
                            <td><?= $transaksi['nomor_hp']; ?></td>
                        </tr>
                        <tr>
                            <th scope="col">Kode Pulsa</th>
                            <td><?= $transaksi['kode_pulsa']; ?></td>
                        </tr>
                        <tr>
                            <th scope="col">Tanggal Transaksi</th>
                            <td><?= date('d-m-Y');
                                $transaksi['tgl_trans']; ?></td>
                        </tr>
                        <tr>
                            <th scope="col">Total Bill</th>
                            <td><?= 'Rp ' . number_format($transaksi['total_bill'], 0, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <th scope="col">Jumlah Uang</th>
                            <td><?= 'Rp ' . number_format($transaksi['jumlah_uang'], 0, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <th scope="col">Kembalian</th>
                            <td><?= 'Rp ' . number_format($transaksi['kembalian'], 0, ',', '.'); ?></td>
                        </tr>
                    </table>
                    <a href="/transaksi/cetakbynotrans/<?= $transaksi['no_trans']; ?>" class="btn btn-success"><i class="fa-solid fa-file-pdf"></i> Cetak Laporan</a>
                    <a href="<?= base_url('/transaksi'); ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>