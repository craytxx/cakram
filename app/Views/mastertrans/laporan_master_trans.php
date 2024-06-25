<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan Data Master Transaksi</title>
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
    <h3 class="text-center">Laporan Data Master Transaksi</h3>
    <hr>
    <table>
        <tr>
            <th scope="col">No</th>
            <th scope="col">No Faktur</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Total Harga</th>
        </tr>
        <?php
        $i = 1;
        foreach ($mastertrans as $p):
            ?>
            <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $p['no_fak']; ?></td>
                <td> <?= date_format(date_create($p['tgl_trans']), 'd-m-Y'); ?></td>
                <td><?= 'Rp ' . number_format($p['tot_harga'], 0, ',', '.'); ?></td>
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