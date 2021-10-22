<?= $this->extend('Template/Layout_admin') ?>
<?= $this->section('content_admin') ?>
<div class="text">

    <div class="row justify-content-center">
        <div class="col-md-6 mt-5 ms-5">
            <div class="card">
                <h2 class="card-header text-center">Data Penerbit</h2>
                <div class="card-body">
                    <a href="<?= site_url('admin/publisher') ?>" class="btn btn-primary mb-3">Kembali ke Daftar</a>
                    <h3 class="text-center mb-5"><?= $penerbit->nama_penerbit ?></h3>
                    <p>Penerbit ini sudah ada sejak <?= $penerbit->tahun_berdiri ?> dan alamatnya terletak di <?= $penerbit->alamat_penerbit ?></p>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>