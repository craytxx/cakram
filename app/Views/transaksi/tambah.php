<?= $this->extend('/template'); ?>
<?= $this->section('content'); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<div class="container">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Form Tambah Transaksi</h3>
            </div>
            <div class="card-body">
                <form action="/transaksi/simpan" method="post">
                    <?= csrf_field(); ?>

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
                    $sql = "SELECT no_fak FROM master_trans";
                    // $sql1 = "SELECT kode_barang,nama FROM barang";
                    // $sql2 = "SELECT kode_jasa,nama FROM jasa";
                    $result = $conn->query($sql);
                    // $result1 = $conn->query($sql1);
                    // $result2 = $conn->query($sql2);
                    ?>
                    <div class="mb-3 row">
                        <label for="no_fak" class="col-sm-2 col-form-label">No Faktur</label>
                        <div class="col-sm-6">
                            <!-- Dropdown menggantikan input text -->
                            <select class="form-select" id="no_fak" name="no_fak">
                                <option value="">--Pilih No Faktur--</option>
                                <?php
                                if ($result->num_rows > 0) {
                                    // Menampilkan data dalam opsi dropdown
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row["no_fak"] . "'>" . $row["no_fak"] . "</option>";
                                    }
                                } else {
                                    echo "<option value=''>Tidak ada kategori tersedia</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                    </div>

                    <!-- <div class="mb-3 row">
                        <label for="kode_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-6">
                            Dropdown menggantikan input text -->
                    <!-- <select class="form-control" id="kode_barang" name="kode_barang">
                                <option value="">Pilih Barang</option>
                                ?php
                                // if ($result1->num_rows > 0) {
                                //     // Menampilkan data dalam opsi dropdown
                                //     while ($row = $result1->fetch_assoc()) {
                                //         echo "<option value='" . $row["nama"] . "'>" . $row["nama"] . "</option>";
                                //     }
                                // } else {
                                //     echo "<option value=''>Tidak ada kategori tersedia</option>";
                                // }
                                // 
                                ?>
                            </select>
                        </div>
                    </div> -->

                    <div class="mb-3 row">
                        <label for="kode_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-6">
                            <select class="form-select" id="kode_barang" name="kode_barang">
                                <option value="">--Pilih Barang--</option>
                                <?php foreach ($barangOptions as $option) : ?>
                                    <option value="<?= $option['kode_barang']; ?>">
                                        <?= $option['nama']; ?> - <?= $option['harga']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <small id="barangInfo" class="form-text text-muted">Informasi barang akan diisi otomatis.</small>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="kode_jasa" class="col-sm-2 col-form-label">Nama Jasa</label>
                        <div class="col-sm-6">
                            <select class="form-select" id="kode_jasa" name="kode_jasa">
                                <option value="">--Pilih Jasa--</option>
                                <?php foreach ($jasaOptions as $option) : ?>
                                    <option value="<?= $option['kode_jasa']; ?>">
                                        <?= $option['nama']; ?> - <?= $option['harga']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <small id="jasaInfo" class="form-text text-muted">Informasi jasa akan diisi otomatis.</small>
                        </div>
                    </div>

                    <?php
                    // Tutup koneksi
                    $conn->close();
                    ?>

                    <div class="mb-3 row">
                        <label for="tgl" class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" id="tgl" name="tgl" value="<?= date('Y-m-d'); ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="jumlah_brg" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="number" id="quantity" name="jumlah_brg">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="total_bill" class="col-sm-2 col-form-label">Total Bill</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="total_bill" name="total_bill" readonly>
                        </div>
                    </div>

                    <div class=" mb-3 row">
                        <label for="jumlah_uang" class="col-sm-2 col-form-label">Jumlah Uang</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="jumlah_uang" name="jumlah_uang">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="kembalian" class="col-sm-2 col-form-label">Kembalian</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="kembalian" name="kembalian" readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-sm-6 offset-sm-2">
                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Simpan
                                Data</button>
                            <a href="<?= base_url('/transaksi'); ?>" class="btn btn-secondary"><i class="fa-solid fa-left-long"></i> Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const kodeBarangSelect = document.getElementById('kode_barang');
        const kodeJasaSelect = document.getElementById('kode_jasa');
        const barangInfo = document.getElementById('barangInfo');
        const jasaInfo = document.getElementById('jasaInfo');
        const quantityInput = document.getElementById('quantity');
        const totalBillInput = document.getElementById('total_bill');
        const jumlahUangInput = document.getElementById('jumlah_uang');
        const kembalianInput = document.getElementById('kembalian');

        let barangHarga = 0;
        let jasaHarga = 0;
        let quantity = 1;

        function updateTotalBill() {
            const total = (parseFloat(barangHarga) * quantity) + parseFloat(jasaHarga);
            totalBillInput.value = total.toFixed(2);
            updateKembalian(); // Perbarui kembalian setiap kali total_bill berubah
        }

        function updateKembalian() {
            const totalBill = parseFloat(totalBillInput.value);
            const jumlahUang = parseFloat(jumlahUangInput.value) || 0;
            const kembalian = jumlahUang - totalBill;
            kembalianInput.value = kembalian.toFixed(2);
        }

        kodeBarangSelect.addEventListener('change', function() {
            const selectedKodeBarang = kodeBarangSelect.value;

            // Lakukan permintaan Ajax untuk mendapatkan informasi barang berdasarkan kode_barang
            fetch(`/transaksi/getBarangInfo/${selectedKodeBarang}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    barangInfo.textContent = `Informasi Barang: ${data.kode_barang} - ${data.harga} - ${data.size}`;
                    barangHarga = parseFloat(data.harga);
                    updateTotalBill();
                })
                .catch(error => {
                    console.error('Error fetching barang info:', error);
                });
        });

        kodeJasaSelect.addEventListener('change', function() {
            const selectedKodeJasa = kodeJasaSelect.value;

            // Lakukan permintaan Ajax untuk mendapatkan informasi jasa berdasarkan kode_jasa
            fetch(`/transaksi/getJasaInfo/${selectedKodeJasa}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    jasaInfo.textContent = `Informasi Jasa: ${data.kode_jasa} - ${data.nama} - ${data.harga}`;
                    jasaHarga = parseFloat(data.harga);
                    updateTotalBill();
                })
                .catch(error => {
                    console.error('Error fetching jasa info:', error);
                });
        });

        quantityInput.addEventListener('input', function() {
            quantity = parseInt(quantityInput.value) || 1;
            updateTotalBill();
        });

        jumlahUangInput.addEventListener('input', function() {
            updateKembalian(); // Perbarui kembalian setiap kali jumlah uang berubah
        });
    });
</script>

<?= $this->endSection(); ?>