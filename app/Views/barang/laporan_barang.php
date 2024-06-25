<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan Data Barang</title>
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
    <h3 class="text-center">Laporan Daftar Barang</h3>
    <hr>
    <table>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Barang</th>
            <th scope="col">Nama</th>
            <th scope="col">Stok</th>
            <th scope="col">Size</th>
            <th scope="col">Harga</th>
            <th scope="col">Kode Supplier</th>
        </tr>
        <?php
        $i = 1;
        foreach ($barang as $p):
            ?>
            <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $p['kode_barang']; ?></td>
                <td><?= $p['nama']; ?></td>
                <td><?= $p['stok']; ?></td>
                <td><?= $p['size']; ?></td>
                <td><?= 'Rp ' . number_format($p['harga'], 0, ',', '.'); ?></td>
                <td><?= $p['kode_supplier']; ?></td>
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