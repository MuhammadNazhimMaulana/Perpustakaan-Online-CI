<?= $this->extend('Template/Layout_admin') ?>
<?= $this->section('content_admin') ?>
<div class="text">

    <div class="row justify-content-center">
        <div class="col-md-6 mt-5 ms-5">
            <div class="card">
                <h2 class="card-header text-center">Data Editor</h2>
                <div class="card-body">
                    <a href="<?= base_url('admin/editor') ?>" class="btn btn-primary mb-3">Kembali ke Daftar</a>
                    <h3 class="text-center mb-5"><?= $editor->nama_editor ?></h3>
                    <div class="text-center mb-3">
                        <img class="align-center" src="<?= base_url('upload/Editor/' . $editor->foto_editor) ?>" alt="">
                    </div>
                    <p>Berikut merupakan alamat email dari editor: <?= $editor->email_editor ?></p>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>