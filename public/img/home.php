<?php $this->extend('template'); ?>
<?php $this->section('content'); ?>
<hr>
<!DOCTYPE html>
<html>
<title>Pengelolaan Barang</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://badoystudio.com/cloudme.fonts.googleapis.com/css?family=Raleway">
<style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5 {
        font-family: "Raleway", sans-serif
    }
</style>

<body class="w3-light-grey">

    <!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
    <div class="w3-content" style="max-width:1400px">

        <!-- Header -->
        <header class="w3-container w3-center padding-22">
            <h1><b>CAKRAM</b></h1>
            <p>CV. Gus Putra Mandiri</p>
        </header>

        <!-- Grid -->
        <div class="w3-row">

            <!-- Blog entries -->
            <div class="w3-col l8 s12">
                <!-- Blog entry -->
                <div class="w3-card-4 w3-margin w3-white">
                    <img src="/img/keren1.jpg" alt="Obat" style="width:100%">
                    <div class="w3-container">
                        <h3><b>CV. GUS PUTRA MANDIRI MELAYANI</b></h3>
                    </div>

                    <div class="w3-container">
                        <p>
                            <!-- 1. Pembelian Apar 
                            <br>(1KG,2KG,3KG,3.5KG,4KG,4.5KG,6KG,9KG)<br>
                            <br>
                            2. Pembelian Fire Hose<br> -->
                            <ol>
                                <li>Gus Putra Mandiri melayani kebutuhan Anda akan peralatan pemadam kebakaran berkualitas tinggi serta jasa servis yang profesional dan handal. </li>
                                <li>Gus Putra Mandiri melayani penjualan peralatan pemadam kebakaran terbaik dan menyediakan layanan servis cepat dan efisien untuk keamanan maksimal.</li>
                                <li>Gus Putra Mandiri melayani penyediaan solusi lengkap dalam peralatan pemadam kebakaran dan jasa servis terpercaya, menjaga keselamatan properti Anda.</li>
                                <li>Gus Putra Mandiri melayani dengan menyediakan produk pemadam kebakaran inovatif dan layanan servis yang andal, memastikan perlindungan terbaik untuk setiap situasi darurat.</li>
                                <li>Gus Putra Mandiri melayani kebutuhan keselamatan Anda dengan peralatan pemadam kebakaran berkualitas dan jasa servis yang responsif dan profesional.</li>
                                <li>Gus Putra Mandiri melayani penjualan peralatan pemadam kebakaran unggulan dan jasa servis yang berfokus pada kepuasan serta keamanan pelanggan.</li>
                                <li>Gus Putra Mandiri melayani dengan komitmen tinggi, menyediakan peralatan pemadam kebakaran dan layanan servis yang memenuhi standar keselamatan tertinggi.</li>
                                <li>Gus Putra Mandiri melayani dengan pengalaman dan keahlian, menawarkan solusi pemadam kebakaran lengkap dan servis berkualitas untuk ketenangan Anda.</li>
                                <li>Gus Putra Mandiri melayani berbagai kebutuhan peralatan pemadam kebakaran serta jasa servis yang efisien, menjamin perlindungan dan kenyamanan Anda.</li>
                                <li>Gus Putra Mandiri melayani dengan menyediakan rangkaian lengkap peralatan pemadam kebakaran dan layanan servis andal, didukung oleh tim profesional yang siap membantu kapan saja.</li>
                            </ol>
                            <hr>
                        </p>
                    </div>
                </div>
                <hr>


            </div>

            <!-- Introduction menu -->
            <div class="w3-col l4">
                <!-- About Card -->
                <div class="w3-card w3-margin w3-margin-top">
                    <img src="/img/cakram_fix.jpg" style="width:100%">
                    <div class="w3-container w3-white">
                        <h4><b>CV. GUS PUTRA MANDIRI</b></h4>
                        <p>CV Gus Putra Mandiri bergerak pada bidang penyediaan barang berupa peralatam Pemadam Api Ringan, 
                           CV Gus Putra Mandiri melayani pembelian dan jasa service atau pengisian APAR.</p>
                    </div>
                </div>
                <hr>
                <!-- Blog entry -->
                <div class="w3-card-4 w3-margin w3-white">
                    <img src="/img/map.png" alt="map" style="width:100%">
                    <div class="w3-container">
                        <h3><b>LOKASI</b></h3>
                    </div>
                    <div class="w3-container">
                        <p>Jl. Asparagus No.33, Mlaki, Wanarejan Utara, Kec. Taman, Kabupaten Pemalang, Jawa Tengah 52361
                            <br>Contact: 081326979091
                        </p>
                    </div>
                </div>
                <!-- END BLOG ENTRIES -->

                <!-- END GRID -->
            </div><br>

            <!-- END w3-content -->
        </div>

        <!-- Footer -->
        <footer class="w3-container w3-red w3-padding-32 w3-margin-top">
            <p>By CAKRAM | Contact: 081326979091 </a></p>
        </footer>

</body>

</html>
<?php $this->endSection(); ?>