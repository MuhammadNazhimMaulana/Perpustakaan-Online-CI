<?= $this->extend('Template/Layout_User') ?>
<?= $this->section('content') ?>


<div class="container mt-5">
    <h1 class="text-center">Pengembalian</h1>
    <p class="text-center">Berikut adalah daftar pengembalian yang telah dilakukan</p>

    <div class="row">
    <?php foreach ($pengembalian as $index => $returns) : ?>
            <div class="col-md-4 mt-5 mb-5">
                <div class="kartu-kembali mt-3 mb-3">
                    <div class="card-view-kembali">
                        <div class="imgBx">
                            <img src="<?= base_url('upload/buku/' . $returns->foto_buku) ?>" width="300">
                        </div>
                        <div class="content_bx">
                            <h3><?= $returns->nama_buku ?></h3>
                            <h2 class="nilai"><?= $returns->tanggal_peminjaman ?></h2>
                            <a href="<?= site_url('user/return/view/' . $returns->id_pengembalian) ?>" class="lebih">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
        <?= $pager->links('pengembalian', 'custom_pagination') ?>
    </div>
</div>


<?= $this->endSection() ?>