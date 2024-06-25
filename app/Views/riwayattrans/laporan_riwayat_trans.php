<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan Data Riwayat Transaksi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 4px;
        }
    </style>
</head>

<body>
    <h3 class="text-center">Laporan Daftar Riwayat Transaksi</h3>
    <hr>
    <table>
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
        <?php
        $i = 1;
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
        <?php endforeach; ?>
    </table>
    <br />
    Pemalang, <?= date('d-m-Y'); ?>
    <br />
    <br />
    <br />
    <br />
    <br />
    CAKRAM
</body>

</html>