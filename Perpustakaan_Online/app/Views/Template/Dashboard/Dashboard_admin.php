<?= $this->extend('Template/Layout_admin') ?>
<?= $this->section('content_admin') ?>
<div class="text extra">
    <h1 style="color: black;">Selamat Datang <?php
                                                echo session()->get('username');
                                                ?></h1>
    <div class="clock mt-5" id="MyClockDisplay">
        <!-- JavaScript Jam-->
        <script src="<?= base_url('Tampilan/JS/clock.js') ?>"></script>
    </div>
</div>


<!-- Tampilan dibawah selamat datang (Bagian Awal)-->
<div class="row g-3 my-2 justify-content-center">
    <div class="col-md-3 ms-3 me-3">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2"><?= $peminjaman ?></h3>
                <p class="fs-5">Peminjaman</p>
            </div>
            <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        </div>
    </div>
    <div class="col-md-3 ms-3 me-3">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2"><?= $pengembalian ?></h3>
                <p class="fs-5">Pengembalian</p>
            </div>
            <i class="fas fa-hand-holding fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        </div>
    </div>
    <div class="col-md-3 ms-3 me-3">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2"><?= $buku ?></h3>
                <p class="fs-5">Jumlah Buku</p>
            </div>
            <i class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        </div>
    </div>
</div>
<!-- Bagian akhir -->

<div class="row p-5 mt-5">
    <div class="col-md-4">
        <div class="card text-dark bg-light mb-3">
            <div class="card-header text-center">Jumlah Peminjaman</div>
            <div class="card-body">
                <div class="container-white">
                    <canvas id="peminjaman" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-dark bg-light mb-3">
            <div class="card-header text-center">Jumlah Pengembalian</div>
            <div class="card-body">
                <div class="container-white">
                    <canvas id="pengembalian" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-dark bg-light mb-3">
            <div class="card-header text-center">Jumlah Buku</div>
            <div class="card-body">
                <div class="container-white">
                    <canvas id="buku" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart JS -->
<script src="<?= base_url('ChartJs/Chart.min.js') ?>"></script>
<script>
    // Chart Untuk Peminjaman
    var kategori_peminjaman = document.getElementById('peminjaman');
    var data_peminjaman = [];
    var label_peminjaman = [];

    <?php foreach ($pinjam_per_kategori->getResult() as $key => $value) : ?>
        data_peminjaman.push(<?= $value->jumlah ?>);
        label_peminjaman.push('<?= $value->user ?>');
    <?php endforeach ?>

    var data_pinjam_per_kategori = {
        datasets: [{
            data: data_peminjaman,
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
            ],
        }],
        labels: label_peminjaman,
    }

    var chart_peminjaman = new Chart(kategori_peminjaman, {
        type: 'doughnut',
        data: data_pinjam_per_kategori
    });

    // Chart Untuk pengembalian
    var kategori_pengembalian = document.getElementById('pengembalian');
    var data_pengembalian = [];
    var label_pengembalian = [];

    <?php foreach ($pengembalian_per_kategori->getResult() as $key => $value) : ?>
        data_pengembalian.push(<?= $value->kembali ?>);
        label_pengembalian.push('<?= $value->user ?>');
    <?php endforeach ?>

    var data_kembali_kategori = {
        datasets: [{
            data: data_pengembalian,
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
            ],
        }],
        labels: label_pengembalian,
    }

    var chart_pengembalian = new Chart(kategori_pengembalian, {
        type: 'doughnut',
        data: data_kembali_kategori
    });

    // Chart Untuk Buku
    var kategori_buku = document.getElementById('buku');
    var data_buku = [];
    var label_buku = [];

    <?php foreach ($kategori_buku->getResult() as $key => $value) : ?>
        data_buku.push(<?= $value->jumlah ?>);
        label_buku.push('<?= $value->tanggal ?>');
    <?php endforeach ?>

    var data_buku_kategori = {
        datasets: [{
            label: 'Jumlah Buku',
            data: data_buku,
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
            ],
        }],
        labels: label_buku,
    }

    var chart_buku = new Chart(kategori_buku, {
        type: 'bar',
        data: data_buku_kategori
    });
</script>
<?= $this->endSection() ?>