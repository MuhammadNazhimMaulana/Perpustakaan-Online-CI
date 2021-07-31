<?= $this->extend('Template/Layout_admin') ?>
<?= $this->section('content_admin') ?>
<?php

$nama_penulis = [
    'name' => 'nama_penulis',
    'id' => 'nama_penulis',
    'value' => $penulis->nama_penulis,
    'class' => 'form-control'
];

$usia_penulis = [
    'name' => 'usia_penulis',
    'id' => 'usia_penulis',
    'value' =>  $penulis->usia_penulis,
    'class' => 'form-control',
    'type' => 'number',
];

$asal_penulis = [
    'name' => 'asal_penulis',
    'id' => 'asal_penulis',
    'value' =>  $penulis->asal_penulis,
    'class' => 'form-control',
];

$foto_penulis = [
    'name' => 'foto_penulis',
    'id' => 'foto_penulis',
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
    <h1 class="text-center mt-3">Update Penulis</h1>
    <div class="row mt-5 justify-content-center">
        <div class="col-md-4">
            <div class="card text-dark bg-light mb-3">
                <div class="card-header text-center">Form Update Penulis</div>
                <div class="card-body">
                    <!-- Open multipart karena ada ngirim gambar -->
                    <?= form_open_multipart('admin/writer/update/' . $penulis->id_penulis) ?>
                    <div class="form-group mt-3">
                        <?= form_label("Nama Penulis", "nama_penulis") ?>
                        <?= form_input($nama_penulis) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Usia Penulis", "usia_penulis") ?>
                        <?= form_input($usia_penulis) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Asal Penulis", "asal_penulis") ?>
                        <?= form_input($asal_penulis) ?>
                    </div>

                    <div class="text-center">
                        <img class="img-fluid mb-3 mt-3" width="100" src="<?= base_url('upload/Penulis/' . $penulis->foto_penulis) ?>" alt="image">
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Foto Penulis", "foto_penulis") ?>

                        <!-- Form Upload karena mau upload gambar -->
                        <?= form_upload($foto_penulis) ?>
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