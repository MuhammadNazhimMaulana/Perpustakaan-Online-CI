<?= $this->extend('Template/Layout_admin') ?>
<?= $this->section('content_admin') ?>
<?php

$nama_editor = [
    'name' => 'nama_editor',
    'id' => 'nama_editor',
    'value' => $editor->nama_editor,
    'class' => 'form-control'
];

$email_editor = [
    'name' => 'email_editor',
    'id' => 'email_editor',
    'value' => $editor->email_editor,
    'class' => 'form-control',
];


$foto_editor = [
    'name' => 'foto_editor',
    'id' => 'foto_editor',
    'value' => null,
    'class' => 'form-control'
];

$submit = [
    'name' => 'submit',
    'id' => 'submit',
    'value' => 'Submit',
    'class' => 'btn btn-success',
    'type' => 'submit'
];

?>

<div class="text">
    <h1 class="mt-4">Edit Editor</h1>

    <div class="row mt-5 justify-content-center">
        <div class="col-md-4">
            <div class="card text-dark bg-light mb-3">
                <div class="card-header text-center">Form Update Editor</div>
                <div class="card-body">
                    <!-- Open multipart karena ada ngirim gambar -->
                    <?= form_open_multipart('admin/editor/update/' . $editor->id_editor) ?>
                    <div class="form-group mt-3">
                        <?= form_label("Nama Editor", "nama_editor") ?>
                        <?= form_input($nama_editor) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Email Editor", "email_editor") ?>
                        <?= form_input($email_editor) ?>
                    </div>

                    <div class="text-center">
                        <img class="img-fluid mb-3 mt-3" width="100" src="<?= base_url('upload/Editor/' . $editor->foto_editor) ?>" alt="image">
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Foto Editor", "foto_editor") ?>

                        <!-- Form Upload karena mau upload gambar -->
                        <?= form_upload($foto_editor) ?>
                    </div>

                    <div class="d-flex justify-content-end mt-3">

                        <!-- Form submit terkait submit-->
                        <?= form_submit($submit) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= form_close() ?>
<?= $this->endSection() ?>