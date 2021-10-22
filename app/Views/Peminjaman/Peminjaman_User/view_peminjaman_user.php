<?= $this->extend('Template/Layout_User') ?>
<?= $this->section('content') ?>
<?php
if (isset($_GET['page_peminjaman'])) {
    $page = $_GET['page_peminjaman'];
    $jumlah = 3;
    $i = ($jumlah * $page) - $jumlah + 1;
} else {
    $i = 1;
}
?>

<div class="container mt-5">
    <h1 class="text-center">Peminjaman</h1>

    <div class="row">
        <?php foreach ($peminjaman as $index => $borrows) : ?>
            <div class="col-md-4 mt-5 mb-5">
                <div class="kartu-pinjam mt-3 mb-3">
                    <div class="card-view">
                        <div class="imgBx">
                            <img src="<?= base_url('upload/buku/' . $borrows->foto_buku) ?>" width="300">
                        </div>
                        <div class="content_bx">
                            <h3><?= $borrows->nama_buku ?></h3>
                            <h2 class="nilai"><?= $borrows->tanggal_peminjaman ?></h2>
                            <a href="<?= site_url('user/borrow/view/' . $borrows->id_peminjaman) ?>" class="lebih">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
        <?= $pager->links('peminjaman', 'custom_pagination') ?>
    </div>
</div>


<?= $this->endSection() ?>