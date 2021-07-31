<?= $this->extend('Template/Layout_User') ?>
<?= $this->section('content') ?>
<?php
if (isset($_GET['page_buku'])) {
    $page = $_GET['page_buku'];
    $jumlah = 3;
    $i = ($jumlah * $page) - $jumlah + 1;
} else {
    $i = 1;
}
?>

<div class="container mb-5 my-3 py-5 text-center Dasar">
    <div class="row mb-5">
        <div class="col">
            <h1 class="custom">Berikut Adalah Daftar Buku Kami</h1>
            <p class="mt-3 tulisan">Berikut merupakan daftar buku yang bisa Anda pinjam melalui web kami</p>
        </div>
    </div>

    <div class="row">
        <?php foreach ($buku as $index => $books) : ?>
            <div class="col-lg-3 col-md-6 mt-5 ms-5">
                <div class="card kartu">
                    <div class="card-body">
                        <a href="<?= base_url('user/book/view/' . $books->id_buku) ?>"><img src="<?= base_url('upload/buku/' . $books->foto_buku) ?>" class="img-fluid rounded-circle w-50 mb-3 gambar"></a>
                        <h3 class="judul-buku"><?= $books->nama_buku ?></h3>
                        <h5><?= $books->nama_penulis ?></h5>
                        <p class="tulisan">Buku ini masih tersisa <?= $books->jumlah_buku ?> kemudian berikut informasi mengenai penerbit, editor</p>
                        <div class="d-flex flex-row justify-content-center">
                            <div class="p-4">
                                <a class="dekorasi" href="<?= base_url('user/publisher') ?>">
                                    <h6 class="info"><?= $books->nama_penerbit ?></h6>
                                </a>
                            </div>
                            <div class="p-4">
                                <a class="dekorasi" href="<?= base_url('user/editor') ?>">
                                    <h6 class="info"><?= $books->nama_editor ?></h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
        <?= $pager->links('buku', 'custom_pagination') ?>
    </div>

</div>

<?= $this->endSection() ?>