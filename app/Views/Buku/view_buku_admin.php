<?= $this->extend('Template/Layout_admin') ?>
<?= $this->section('content_admin') ?>
<?php
if (isset($_GET['page_buku'])) {
    $page = $_GET['page_buku'];
    $jumlah = 3;
    $i = ($jumlah * $page) - $jumlah + 1;
} else {
    $i = 1;
}
?>

<div class="text">
    <h1>Buku</h1>

    <div class="row">
        <div class="col-md-9 mt-5 ms-5">
            <div class="card">
                <h5 class="card-header text-center">Daftar Buku</h5>
                <div class="card-body">
                    <a href="<?= base_url('admin/book/add') ?>" class="btn btn-primary mb-3">Tambah Buku</a>
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">No.</th>
                                <th scope="col">Nama Penulis</th>
                                <th scope="col">Nama Penerbit</th>
                                <th scope="col">Nama Editor</th>
                                <th scope="col">Nama Rak</th>
                                <th scope="col">Nama Buku</th>
                                <th scope="col">Jumlah Buku</th>
                                <th scope="col">Tahun Terbit</th>
                                <th scope="col">Foto Buku</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($buku as $index => $books) : ?>
                                <tr class="text-center">
                                    <th><?= $i++ ?></th>
                                    <td><?= $books->nama_penulis ?></td>
                                    <td><?= $books->nama_penerbit ?></td>
                                    <td><?= $books->nama_editor ?></td>
                                    <td><?= $books->lokasi ?></td>
                                    <td><?= $books->nama_buku ?></td>
                                    <td><?= $books->jumlah_buku ?></td>
                                    <td><?= $books->tahun_terbit ?></td>
                                    <td><img src="<?= base_url('upload/buku/' . $books->foto_buku) ?>" alt="" width="100"></td>
                                    <td class="col-md-3">
                                        <a href="<?= base_url('admin/book/view/' . $books->id_buku) ?>" class="btn btn-primary">View</a>
                                        <a href="<?= base_url('admin/book/update/' . $books->id_buku) ?>" class="btn btn-success">Update</a>
                                        <a href="<?= base_url('admin/book/delete/' . $books->id_buku) ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <?= $pager->links('buku', 'custom_pagination') ?>
                </div>
            </div>
        </div>
        <div class="col-md-2 mt-5 ms-5">
            <div class="card">
                <h5 class="card-header text-center">Tambahan</h5>
                <div class="card-body">
                    <a href="#" class="btn btn-primary mb-3">Tambah buku</a>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>