<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 85%;
            margin: auto;
        }

        .card {
            margin-top: 20px;
            border: 1px solid black;
            border-radius: 10px;
        }

        .card-header {
            color: black;
            border-bottom: 1px solid black;
            text-align: center;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
        }

        p {
            font-size: 16px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class='container'>
        <div class='row'>
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Laporan Struk Transaksi</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered mt-3">
                            <tr>
                                <th scope="col">No Faktur</th>
                                <td><?= $transaksi['no_fak']; ?></td>
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
                        <p>Laporan Struk ini merupakan bukti pembayaran yang sah, Terima Kasih atas pembeliannya.</p>
                    </div>
                    <div class="footer">
                        Pekalongan, <?= date('d-m-Y'); ?>
                        <br />
                        <br />
                        <br />
                        Doni DS
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>