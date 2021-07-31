<?= $this->extend('Template/Layout_User') ?>
<?= $this->section('content') ?>


<div class="container mt-5">
    <h1 class="text-center">Penulis</h1>

    <div class="row">
        <?php foreach ($penulis as $index => $writers) : ?>
    <div class="col-md-4 mt-5 mb-5">
            <div class="penampung">
                <div class="kartu-p">
                    <div class="kartu-gambar">
                        <img src="<?= base_url('upload/Penulis/' . $writers->foto_penulis) ?>">
                    </div>
                    <div class="kartu-isi">
                        <h4 class="mb-5"><?= $writers->nama_penulis ?></h4>
                        <a href="<?= site_url('user/writer/view/'. $writers->id_penulis) ?>" class="tombol-cool">Detail</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach ?>
        <?= $pager->links('penulis', 'custom_pagination') ?>
    </div>
</div>

<?= $this->endSection() ?>