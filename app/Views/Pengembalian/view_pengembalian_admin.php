<?= $this->extend('Template/Layout_admin') ?>
<?= $this->section('content_admin') ?>
<?php
if (isset($_GET['page_pengembalian'])) {
    $page = $_GET['page_pengembalian'];
    $jumlah = 3;
    $i = ($jumlah * $page) - $jumlah + 1;
} else {
    $i = 1;
}
?>

<div class="text">
    <h1>Pengembalian</h1>

    <div class="row">
        <div class="col-md-8 mt-5 ms-5">
            <div class="card">
                <h5 class="card-header text-center">Daftar Pengembalian</h5>
                <div class="card-body">
                    <a href="<?= base_url('admin/return/add') ?>" class="btn btn-primary mb-3">Tambah Peminjam</a>
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">No.</th>
                                <th scope="col">Nama Anggota</th>
                                <th scope="col">Nama Buku</th>
                                <th scope="col">Tanggal Pinjam</th>
                                <th scope="col">Tanggal Pengembalian</th>
                                <th scope="col">Denda</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pengembalian as $index => $returns) : ?>
                                <tr class="text-center">
                                    <th><?= $i++ ?></th>
                                    <td><?= $returns->nama_user ?></td>
                                    <td><?= $returns->nama_buku ?></td>
                                    <td><?= $returns->tanggal_peminjaman ?></td>
                                    <td><?= $returns->tanggal_pengembalian ?></td>
                                    <td><?= $returns->denda ?></td>
                                    <td><?= $returns->ket_pengembalian ?></td>
                                    <td class="col-md-5">
                                        <a href="<?= site_url('admin/return/view/' . $returns->id_pengembalian) ?>" class="btn btn-primary">View</a>
                                        <a href="<?= site_url('admin/return/update/' . $returns->id_pengembalian) ?>" class="btn btn-success">Update</a>
                                        <a href="<?= site_url('admin/return/delete/' . $returns->id_pengembalian) ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <?= $pager->links('pengembalian', 'custom_pagination') ?>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-5 ms-5">
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