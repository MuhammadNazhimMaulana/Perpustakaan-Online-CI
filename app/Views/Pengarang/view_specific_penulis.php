<?= $this->extend('Template/Layout_admin') ?>
<?= $this->section('content_admin') ?>
<div class="text">

    <div class="row justify-content-center">
        <div class="col-md-6 mt-5 ms-5">
            <div class="card">
                <h2 class="card-header text-center">Data Penulis</h2>
                <div class="card-body">
                    <a href="<?= base_url('admin/writer') ?>" class="btn btn-primary mb-3">Kembali ke Daftar</a>
                    <h3 class="text-center mb-5"><?= $penulis->nama_penulis ?></h3>
                    <div class="text-center mb-3">
                        <img class="align-center" src="<?= base_url('upload/Penulis/' . $penulis->foto_penulis) ?>" alt="">
                    </div>
                    <p><?= $penulis->nama_penulis ?> berusia kurang lebih <?= $penulis->usia_penulis ?> dan berasal dari kota <?= $penulis->asal_penulis ?></p>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>