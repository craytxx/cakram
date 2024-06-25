<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan Data Jasa</title>
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
    <h3 class="text-center">Laporan Daftar Jasa</h3>
    <hr>
    <table>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Jasa</th>
            <th scope="col">Nama</th>
            <th scope="col">Harga</th>
        </tr>
        <?php
        $i = 1;
        foreach ($jasa as $p):
            ?>
            <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $p['kode_jasa']; ?></td>
                <td><?= $p['nama']; ?></td>
                <td><?= 'Rp ' . number_format($p['harga'], 0, ',', '.'); ?></td>
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