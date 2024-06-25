<?= $this->extend('/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Form Tambah Data Barang</h3>
            </div>
            <div class="card-body">
                <form action="/barang/simpan" method="post">
                    <?= csrf_field(); ?>

                    <div class="mb-3 row">
                        <label for="kode_barang" class="col-sm-2 col-form-label">Kode Barang</label>
                        <div class="col-sm-6">
                            <input type="text"
                                class="form-control <?= array_key_exists('kode_barang', $error) ? 'is-invalid' : ''; ?>"
                                id="kode_barang" name="kode_barang" value="<?= set_value('kode_barang'); ?>">
                            <div id="kode_barangFeedback" class="invalid-feedback">
                                <?= array_key_exists('kode_barang', $error) ? $error['kode_barang'] : ''; ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="stok" name="stok">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="size" class="col-sm-2 col-form-label">Size</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="size" name="size">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="harga" name="harga">
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
                            <select class="form-control" id="kode_supplier" name="kode_supplier">
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

                    <div class="mb-3 row">
                        <div class="col-sm-6 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                            <a href="<?= base_url('/barang'); ?>" class="btn btn-secondary"><i
                                    class="fa-solid fa-left-long"></i> Kembali</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>