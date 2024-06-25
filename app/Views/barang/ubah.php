<?= $this->extend('/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="col">
        <h3 class="text-center">Form Ubah Barang</h3>
        <hr>

        <form action="/barang/update/<?= $barang['kode_barang']; ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="row mb-3">
                <label  for="kode_barang" class="col-sm-2 col-form-label">Kode Barang</label>
                <div class="col-sm-6">
                    <input readonly type="text" class="form-control" id="kode_barang" name="kode_barang"
                        value="<?= $barang['kode_barang']; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $barang['nama']; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" id="stok" name="stok" value="<?= $barang['stok']; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="size" class="col-sm-2 col-form-label">Size</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="size" name="size" value="<?= $barang['size']; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="harga" name="harga" value="<?= $barang['harga']; ?>">
                </div>
            </div>
            
            <?php
                    // Koneksi ke database
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "cakram";

                    // Buat koneksi
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Cek koneksi
                    if ($conn->connect_error) {
                        die("Koneksi gagal: " . $conn->connect_error);
                    }

                    // Query untuk mengambil data dari tabel categories
                    $sql = "SELECT * FROM supplier";
                    $result = $conn->query($sql);
                    ?>

                    <!-- <div class="mb-3 row">
                        <label for="kode_supplier" class="col-sm-2 col-form-label">Kode Supplier</label>
                        <div class="col-sm-6">
                            <<input type="text" class="form-control" id="kode_supplier" name="kode_supplier">
                        </div>
                    </div> -->


                    <div class="mb-3 row">
                        <label for="kode_supplier" class="col-sm-2 col-form-label">Kode Supplier</label>
                        <div class="col-sm-6">
                            <!-- Dropdown menggantikan input text -->
                            <select class="form-control" id="kode_supplier" name="kode_supplier" value="<?= $barang['kode_supplier']; ?>">
                                <option value="">Pilih Supplier</option>
                                <?php
                                if ($result->num_rows > 0) {
                                    // Menampilkan data dalam opsi dropdown
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row["kode_supplier"] . "'>" . $row["nama"] . "</option>";
                                    }
                                } else {
                                    echo "<option value=''>Tidak ada kategori tersedia</option>";
                                }
                                ?>
                                
                            </select>
                        </div>
                    </div>

                    <?php
                    // Tutup koneksi
                    $conn->close();
                    ?>

            <!-- <div class="row mb-3">
                <label for="kode_supplier" class="col-sm-2 col-form-label">Kode Supplier</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="kode_supplier" name="kode_supplier" value="?= $barang['kode_supplier']; ?>">
                </div>
            </div> -->
            
            <button type="submit" class="btn btn-primary">Ubah Data</button>
            <a href="<?= base_url('/barang'); ?>" class="btn btn-secondary"><i class="fa-solid fa-left-long"></i> Kembali</a>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>