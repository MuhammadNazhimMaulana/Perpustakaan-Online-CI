<?= $this->extend('Template/Layout_admin') ?>
<?= $this->section('content_admin') ?>
<?php

$nama_editor = [
    'name' => 'nama_editor',
    'id' => 'nama_editor',
    'value' => null,
    'class' => 'form-control'
];

$email_editor = [
    'name' => 'email_editor',
    'id' => 'email_editor',
    'value' => null,
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
    <h1 class="mt-4">Tambah Editor</h1>

    <div class="row mt-5 justify-content-center">
        <div class="col-md-4">
            <div class="card text-dark bg-light mb-3">
                <div class="card-header text-center">Form Tambah Editor</div>
                <div class="card-body">
                    <!-- OPen multipart karena ada ngirim foto_editor -->
                    <?= form_open_multipart('admin/editor/add') ?>
                    <div class="form-group mt-3">
                        <?= form_label("Nama Editor", "nama_editor") ?>
                        <?= form_input($nama_editor) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Email Editor", "email_editor") ?>
                        <?= form_input($email_editor) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Foto Editor", "foto_editor") ?>

                        <!-- Form Upload karena mau upload foto_editor -->
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