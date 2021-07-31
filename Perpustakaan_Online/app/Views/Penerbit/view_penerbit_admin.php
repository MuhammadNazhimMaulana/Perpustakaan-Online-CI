<?= $this->extend('Template/Layout_admin') ?>
<?= $this->section('content_admin') ?>
<?php
if (isset($_GET['page_penerbit'])) {
    $page = $_GET['page_penerbit'];
    $jumlah = 3;
    $i = ($jumlah * $page) - $jumlah + 1;
} else {
    $i = 1;
}
?>

<div class="text">
    <h1>Penerbit</h1>

    <div class="row">
        <div class="col-md-8 mt-5 ms-5">
            <div class="card">
                <h5 class="card-header text-center">Daftar Penerbit</h5>
                <div class="card-body">
                    <a href="<?= site_url('admin/publisher/add') ?>" class="btn btn-primary mb-3">Tambah Penerbit</a>
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th>No.</th>
                                <th>Nama Penerbit</th>
                                <th>Alamat Penerbit</th>
                                <th>Tahun Berdiri</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($penerbit as $index => $publisher) : ?>
                                <tr>
                                    <th><?= $i++ ?></th>
                                    <td><?= $publisher->nama_penerbit ?></td>
                                    <td><?= $publisher->alamat_penerbit ?></td>
                                    <td><?= $publisher->tahun_berdiri ?></td>
                                    <td class="col-md-4">
                                        <a href="<?= site_url('admin/publisher/view/' . $publisher->id_penerbit) ?>" class="btn btn-primary">View</a>
                                        <a href="<?= site_url('admin/publisher/update/' . $publisher->id_penerbit) ?>" class="btn btn-success">Update</a>
                                        <a href="<?= site_url('admin/publisher/delete/' . $publisher->id_penerbit) ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <?= $pager->links('penerbit', 'custom_pagination') ?>
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