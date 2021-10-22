<?= $this->extend('Template/Layout_admin') ?>
<?= $this->section('content_admin') ?>
<?php
if (isset($_GET['page_penulis'])) {
    $page = $_GET['page_penulis'];
    $jumlah = 3;
    $i = ($jumlah * $page) - $jumlah + 1;
} else {
    $i = 1;
}
?>

<div class="text">
    <h1>Penulis</h1>

    <div class="row">
        <div class="col-md-7 mt-5 ms-5">
            <div class="card">
                <h5 class="card-header text-center">Daftar Penulis</h5>
                <div class="card-body">
                    <a href="<?= base_url('admin/writer/add') ?>" class="btn btn-primary mb-3">Tambah Penulis</a>
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">No.</th>
                                <th scope="col">Nama Penulis</th>
                                <th scope="col">Usia Penulis</th>
                                <th scope="col">Asal Penulis</th>
                                <th scope="col">Foto Penulis</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($penulis as $index => $writers) : ?>
                                <tr class="text-center">
                                    <th><?= $i++ ?></th>
                                    <td><?= $writers->nama_penulis ?></td>
                                    <td><?= $writers->usia_penulis ?></td>
                                    <td><?= $writers->asal_penulis ?></td>
                                    <td><img src="<?= base_url('upload/Penulis/' . $writers->foto_penulis) ?>" alt="" width="100"></td>
                                    <td class="col-md-5">
                                        <a href="<?= site_url('admin/writer/view/' . $writers->id_penulis) ?>" class="btn btn-primary">View</a>
                                        <a href="<?= site_url('admin/writer/update/' . $writers->id_penulis) ?>" class="btn btn-success">Update</a>
                                        <a href="<?= site_url('admin/writer/delete/' . $writers->id_penulis) ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <?= $pager->links('penulis', 'custom_pagination') ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-5 ms-5">
            <div class="card">
                <h5 class="card-header text-center">Tambahan</h5>
                <div class="card-body">
                    <a href="#" class="btn btn-primary mb-3">Tambah Penulis</a>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>