<!DOCTYPE html>
<html lang="en">

<head>
    <title>CAKRAM - <?= $judul; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark" style="background-color: red;">
        <div class="container-fluid">
            <a class="navbar-brand" href="/home"><i class="fa-solid fa-store"></i> CAKRAM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/home" title="Home"><i class="fa-solid fa-house"></i> Home</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="/home/about"><i class="fa-solid fa-circle-info"></i> About</a>
                    </li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-toggle="tooltip" data-placement="bottom" title="Menu">
                            <i class="fa-solid fa-list"></i> Menu
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/barang"><i class="fa-solid fa-box"></i> Daftar Barang</a></li>
                            <li><a class="dropdown-item" href="/supplier"><i class="fa-solid fa-dolly"></i> Daftar Supplier</a></li>
                            <li><a class="dropdown-item" href="/jasa"><i class="fa-solid fa-user-gear"></i> Daftar Jasa</a></li>
                            <li><a class="dropdown-item" href="/mastertrans"><i class="fa-solid fa-receipt"></i> Master Transaksi</a></li>
                            <li><a class="dropdown-item" href="/transaksi"><i class="fa-solid fa-money-bill-wave"></i> Transaksi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-toggle="tooltip" data-placement="bottom" title="Menu">
                            <i class="fa-solid fa-list"></i> Riwayat
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/riwayatbarang"><i class="fa-solid fa-folder"></i> Riwayat Barang</a></li>
                            <li><a class="dropdown-item" href="/riwayattrans"><i class="fa-regular fa-folder"></i> Riwayat Transaksi</a></li>
                        </ul>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="/barang"><i class="fa-solid fa-list"></i> Daftar Barang</a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="/transaksi" title="Transaksi"><i class="fa-solid fa-money-bill-wave"></i> Transaksi</a>
                    </li> -->
                    <li class="nav-item">
                        <?php if (logged_in()) : ?>
                            <a class="nav-link" href="/logout" title="Logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
                        <?php else : ?>
                            <a class="nav-link" href="/login" title="Login"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
                        <?php endif; ?>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Cari data disini" name="keyword">
                    <button class="btn btn-warning" type="submit" name="submit">
                        <i class="fa-solid fa-search"></i></button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid mt-3">
        <?php $this->renderSection('content'); ?>
        <?php $this->renderSection('about'); ?>
        <?php $this->renderSection('contact'); ?>

    </div>
</body>

</html>