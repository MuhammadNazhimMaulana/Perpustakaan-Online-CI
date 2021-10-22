<?= $this->extend('Template/Layout_admin') ?>
<?= $this->section('content_admin') ?>
<?php

$nama_penerbit = [
    'name' => 'nama_penerbit',
    'id' => 'nama_penerbit',
    'value' => null,
    'class' => 'form-control'
];

$alamat_penerbit = [
    'name' => 'alamat_penerbit',
    'id' => 'alamat_penerbit',
    'value' => null,
    'class' => 'form-control'
];

$tahun_berdiri = [
    'name' => 'tahun_berdiri',
    'id' => 'tahun_berdiri',
    'value' => null,
    'class' => 'form-control',
    'type' => 'number',
];

$submit = [
    'name' => 'submit',
    'id' => 'submit',
    'value' => 'Submit',
    'class' => 'btn btn-success',
    'type' => 'submit'
];

$session = session();
$errors = $session->getFlashdata('errors');
?>

<div class="text">
    <h1 class="text-center mt-3">Create Penerbit</h1>
    <div class="row mt-5 justify-content-center">
        <div class="col-md-4 mt-5">
            <div class="card text-dark bg-light mb-3">
                <h5 class="card-header text-center">Form Tambah Penerbit</h5>
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
                    <?= form_open('admin/publisher/add') ?>
                    <div class="form-group mt-3">
                        <?= form_label("Nama Penerbit", "nama_penerbit") ?>
                        <?= form_input($nama_penerbit) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Alamat Penerbit", "alamat_penerbit") ?>
                        <?= form_input($alamat_penerbit) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Tahun Berdiri", "tahun_berdiri") ?>
                        <?= form_input($tahun_berdiri) ?>
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