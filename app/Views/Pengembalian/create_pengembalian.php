<?= $this->extend('Template/Layout_admin') ?>
<?= $this->section('content_admin') ?>
<?php


$id_peminjaman = [
    'name' => 'id_peminjaman',
    'id' => 'id_peminjaman',
    'options' => $daftar_peminjam,
    'class' => 'form-control'
];

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

$tanggal_pengembalian = [
    'name' => 'tanggal_pengembalian',
    'id' => 'tanggal_pengembalian',
    'value' => null,
    'class' => 'form-control',
    'type' => 'date'
];

$denda = [
    'name' => 'denda',
    'id' => 'denda',
    'value' => null,
    'class' => 'form-control',
    'type' => 'number'
];

$ket_pengembalian = [
    'name' => 'ket_pengembalian',
    'id' => 'ket_pengembalian',
    'value' => null,
    'class' => 'form-control',
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
    <h1 class="mt-4 text-center">Tambah Pengembalian</h1>
    <div class="row mt-5 justify-content-center">
        <div class="col-md-4">
            <div class="card text-dark bg-light mb-3">
                <div class="card-header text-center">Form Tambah Pengembalian</div>
                <div class="card-body">
                    <?= form_open('admin/return/add') ?>


                    <div class="form-group mt-3">
                        <?= form_label("Nama Pengembali", "id_user") ?>
                        <?= form_dropdown($id_user) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Nama Buku", "id_buku") ?>
                        <?= form_dropdown($id_buku) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Tanggal Peminjaman", "id_peminjaman") ?>
                        <?= form_dropdown($id_peminjaman) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Tanggal Pengembalian", "tanggal_pengembalian") ?>
                        <?= form_input($tanggal_pengembalian) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Denda (Jika Ada)", "denda") ?>
                        <?= form_input($denda) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Keterangan Pengembalian", "ket_pengembalian") ?>
                        <?= form_input($ket_pengembalian) ?>
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