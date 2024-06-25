<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan Data Supplier</title>
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
    <h3 class="text-center">Laporan Data Supplier</h3>
    <hr>
    <table>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Supplier</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Telp</th>
        </tr>
        <?php
        $i = 1;
        foreach ($supplier as $p):
            ?>
            <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $p['kode_supplier']; ?></td>
                <td><?= $p['nama']; ?></td>
                <td><?= $p['alamat']; ?></td>
                <td><?= $p['telp']; ?></td>
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