<?= $this->extend('Template/Layout_admin') ?>
<?= $this->section('content_admin') ?>
<?php


$id_user = [
    'name' => 'id_user',
    'id' => 'id_user',
    'options' => $daftar_anggota,
    'class' => 'form-control'
];

$id_buku = [
    'name' => 'id_buku',
    'id' => 'id_buku',
    'options' => $daftar_buku,
    'class' => 'form-control'
];

$tanggal_peminjaman = [
    'name' => 'tanggal_peminjaman',
    'id' => 'tanggal_peminjaman',
    'value' => null,
    'class' => 'form-control',
    'type' => 'date'
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
    <h1 class="mt-4">Tambah Peminjaman</h1>
    <div class="row mt-5 justify-content-center">
        <div class="col-md-4">
            <div class="card text-dark bg-light mb-3">
                <div class="card-header text-center">Form Tambah Peminjaman</div>
                <div class="card-body">

                    <?= form_open('admin/borrow/add') ?>

                    <div class="form-group mt-3">
                        <?= form_label("Nama Peminjam", "id_user") ?>
                        <?= form_dropdown($id_user) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Nama Buku", "id_buku") ?>
                        <?= form_dropdown($id_buku) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Tanggal Pinjam", "tanggal_peminjaman") ?>
                        <?= form_input($tanggal_peminjaman) ?>
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