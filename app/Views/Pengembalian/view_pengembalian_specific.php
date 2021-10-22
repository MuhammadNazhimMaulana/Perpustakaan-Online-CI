<?= $this->extend('Template/Layout_admin') ?>
<?= $this->section('content_admin') ?>
<div class="text">

    <div class="row justify-content-center">
        <div class="col-md-6 mt-5 ms-5">
            <div class="card">
                <h2 class="card-header text-center">Data Pengembalian</h2>
                <div class="card-body">
                    <a href="<?= base_url('admin/return') ?>" class="btn btn-primary mb-3">Kembali ke Daftar</a>
                    <h3 class="text-center mb-5"><?= $pengembalian->nama_user ?></h3>
                    <p>Buku yang dipinjam adalah <?= $pengembalian->nama_buku ?>, dipinjam pada tanggal <?= $pengembalian->tanggal_peminjaman ?>. Dan dikembalikan pada tanggal <?= $pengembalian->tanggal_pengembalian ?></p>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>