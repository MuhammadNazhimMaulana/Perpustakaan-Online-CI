<?= $this->extend('Template/Layout_admin') ?>
<?= $this->section('content_admin') ?>
<?php
if (isset($_GET['page_editor'])) {
    $page = $_GET['page_editor'];
    $jumlah = 3;
    $i = ($jumlah * $page) - $jumlah + 1;
} else {
    $i = 1;
}
?>
<div class="text">
    <h1>Editor</h1>

    <div class="row">
        <div class="col-md-7 mt-5 ms-5">
            <div class="card">
                <h5 class="card-header text-center">Daftar Editor</h5>
                <div class="card-body">
                    <a href="<?= base_url('admin/editor/add') ?>" class="btn btn-primary mb-3">Tambah Editor</a>
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">No.</th>
                                <th scope="col">Nama Editor</th>
                                <th scope="col">Email Editor</th>
                                <th scope="col">Foto Editor</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($editor as $index => $editors) : ?>
                                <tr class="text-center">
                                    <th><?= $i++ ?></th>
                                    <td><?= $editors->nama_editor ?></td>
                                    <td><?= $editors->email_editor ?></td>
                                    <td><img src="<?= base_url('upload/editor/' . $editors->foto_editor) ?>" alt="" width="100"></td>
                                    <td class="col-md-5">
                                        <a href="<?= site_url('admin/editor/view/' . $editors->id_editor) ?>" class="btn btn-primary">View</a>
                                        <a href="<?= site_url('admin/editor/update/' . $editors->id_editor) ?>" class="btn btn-success">Update</a>
                                        <a href="<?= site_url('admin/editor/delete/' . $editors->id_editor) ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <?= $pager->links('editor', 'custom_pagination') ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-5 ms-5">
            <div class="card">
                <h5 class="card-header text-center">Tambahan</h5>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>