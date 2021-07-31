<?= $this->extend('Template/Layout_admin') ?>
<?= $this->section('content_admin') ?>
<?php

$lokasi = [
    'name' => 'lokasi',
    'id' => 'lokasi',
    'value' => $rak->lokasi,
    'class' => 'form-control'
];

$submit = [
    'name' => 'submit',
    'id' => 'submit',
    'value' => 'Update',
    'class' => 'btn btn-success',
    'type' => 'submit'
];

$session = session();
$errors = $session->getFlashdata('errors');
?>

<div class="text">
    <h1 class="text-center mt-3">Update Rak</h1>
    <div class="row mt-5 justify-content-center">
        <div class="col-md-4 mt-5">
            <div class="card text-dark bg-light mb-3">
                <h5 class="card-header text-center">Form Ubah Rak</h5>
                <div class="card-body">
                    <!-- Awal session validasi-->
                    <?php if ($errors != null) : ?>
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Terjadi Kesalahan</h4>
                            <hr>
                            <p class="mb-0">
                                <?php foreach ($errors as $err) {
                                    echo $err . '<br>';
                                }

                                ?>
                            </p>
                        </div>
                    <?php endif ?>
                    <!-- Akhir session validasi -->

                    <!-- Form Input Data -->
                    <?= form_open('admin/rack/update/' . $rak->id_rak) ?>
                    <div class="form-group mt-3">
                        <?= form_label("Lokasi Rak", "lokasi") ?>
                        <?= form_input($lokasi) ?>
                    </div>

                    <div class="d-flex justify-content-end mt-3">

                        <!-- Form submit terkait submit-->
                        <?= form_submit($submit) ?>
                    </div>

                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>