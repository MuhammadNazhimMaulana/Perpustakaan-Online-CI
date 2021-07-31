<?= $this->extend('Template/Layout_admin') ?>
<?= $this->section('content_admin') ?>
<div class="text">

    <div class="row justify-content-center">
        <div class="col-md-6 mt-5 ms-5">
            <div class="card">
                <h2 class="card-header text-center">Data Rak</h2>
                <div class="card-body">
                    <a href="<?= base_url('admin/rack') ?>" class="btn btn-primary mb-3">Kembali ke Daftar</a>
                    <h3 class="text-center mb-5">Lokasi rak nya terletak di <?= $rak->lokasi ?></h3>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>