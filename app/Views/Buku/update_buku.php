<?= $this->extend('Template/Layout_admin') ?>
<?= $this->section('content_admin') ?>
<?php


$id_penulis = [
    'name' => 'id_penulis',
    'id' => 'id_penulis',
    'options' => $daftar_penulis,
    'class' => 'form-control',
    'selected' => $buku->id_penulis
];

$id_penerbit = [
    'name' => 'id_penerbit',
    'id' => 'id_penerbit',
    'options' => $daftar_penerbit,
    'class' => 'form-control',
    'selected' => $buku->id_penerbit
];

$id_editor = [
    'name' => 'id_editor',
    'id' => 'id_editor',
    'options' => $daftar_editor,
    'class' => 'form-control',
    'selected' => $buku->id_editor
];

$id_rak = [
    'name' => 'id_rak',
    'id' => 'id_rak',
    'options' => $daftar_rak,
    'class' => 'form-control',
    'selected' => $buku->id_rak
];


$nama_buku = [
    'name' => 'nama_buku',
    'id' => 'nama_buku',
    'value' => $buku->nama_buku,
    'class' => 'form-control',
];

$jumlah_buku = [
    'name' => 'jumlah_buku',
    'id' => 'jumlah_buku',
    'value' => $buku->jumlah_buku,
    'class' => 'form-control',
    'type' => 'number',
];

$tahun_terbit = [
    'name' => 'tahun_terbit',
    'id' => 'tahun_terbit',
    'value' => $buku->tahun_terbit,
    'class' => 'form-control',
];

$foto_buku = [
    'name' => 'foto_buku',
    'id' => 'foto_buku',
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
    <h1 class="mt-4 text-center">Ubah Buku</h1>

    <div class="row mt-5 justify-content-center">
        <div class="col-md-4">
            <div class="card text-dark bg-light mb-3">
                <div class="card-header text-center">Form Update Buku</div>
                <div class="card-body">

                    <!-- OPen multipart karena ada ngirim foto_buku -->
                    <?= form_open_multipart('admin/book/update/' . $buku->id_buku) ?>

                    <div class="form-group mt-3">
                        <?= form_label("Nama Penulis", "id_penulis") ?>
                        <?= form_dropdown($id_penulis) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Nama Penerbit", "id_penerbit") ?>
                        <?= form_dropdown($id_penerbit) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Nama Editor", "id_editor") ?>
                        <?= form_dropdown($id_editor) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Nama Rak", "id_rak") ?>
                        <?= form_dropdown($id_rak) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Nama Buku", "nama_buku") ?>
                        <?= form_input($nama_buku) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Jumlah Buku", "jumlah_buku") ?>
                        <?= form_input($jumlah_buku) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Tahun Terbit", "tahun_terbit") ?>
                        <?= form_input($tahun_terbit) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Foto Buku", "foto_buku") ?>

                        <div class="text-center">
                            <img class="img-fluid mb-3 mt-3" width="100" src="<?= base_url('upload/Buku/' . $buku->foto_buku) ?>" alt="image">
                        </div>

                        <!-- Form Upload karena mau upload foto_buku -->
                        <?= form_upload($foto_buku) ?>
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