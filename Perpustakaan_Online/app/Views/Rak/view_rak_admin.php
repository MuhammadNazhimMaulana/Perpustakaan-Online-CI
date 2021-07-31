<?= $this->extend('Template/Layout_admin') ?>
<?= $this->section('content_admin') ?>
<?php
if (isset($_GET['page_rak'])) {
    $page = $_GET['page_rak'];
    $jumlah = 3;
    $i = ($jumlah * $page) - $jumlah + 1;
} else {
    $i = 1;
}
?>

<div class="text">
    <h1>Rak</h1>

    <div class="row">
        <div class="col-md-8 mt-5 ms-5">
            <div class="card">
                <h5 class="card-header text-center">Daftar Rak</h5>
                <div class="card-body">
                    <a href="<?= base_url('admin/rack/add') ?>" class="btn btn-primary mb-3">Tambah Rak</a>
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th>No.</th>
                                <th>Lokasi Rak</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($rak as $index => $rack) : ?>
                                <tr>
                                    <th><?= $i++ ?></th>
                                    <td><?= $rack->lokasi ?></td>
                                    <td class="col-md-4">
                                        <a href="<?= base_url('admin/rack/view/' . $rack->id_rak) ?>" class="btn btn-primary">View</a>
                                        <a href="<?= base_url('admin/rack/update/' . $rack->id_rak) ?>" class="btn btn-success">Update</a>
                                        <a href="<?= base_url('admin/rack/delete/' . $rack->id_rak) ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <?= $pager->links('rak', 'custom_pagination') ?>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-5 ms-5">
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