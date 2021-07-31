<?= $this->extend('Template/Layout_User') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1 class="text-center">Editor</h1>

    <div class="row">
        <?php foreach ($editor as $index => $editors) : ?>
    <div class="col-md-4 mt-5 mb-5">
            <div class="penampung">
                <div class="kartu-p">
                    <div class="kartu-gambar">
                        <img src="<?= base_url('upload/Editor/' . $editors->foto_editor) ?>">
                    </div>
                    <div class="kartu-isi">
                        <h4 class="mb-5"><?= $editors->nama_editor ?></h4>
                        <a href="<?= site_url('user/editor/view/'. $editors->id_editor) ?>" class="tombol-cool">Detail</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach ?>
        <?= $pager->links('editor', 'custom_pagination') ?>
    </div>
</div>

<?= $this->endSection() ?>