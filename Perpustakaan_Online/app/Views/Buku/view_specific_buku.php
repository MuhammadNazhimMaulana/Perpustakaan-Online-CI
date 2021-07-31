<?= $this->extend('Template/Layout_admin') ?>
<?= $this->section('content_admin') ?>
<div class="text">

    <div class="row justify-content-center">
        <div class="col-md-6 mt-5 ms-5">
            <div class="card">
                <h2 class="card-header text-center">Data Buku</h2>
                <div class="card-body">
                    <a href="<?= base_url('admin/book') ?>" class="btn btn-primary mb-3">Kembali ke Daftar</a>
                    <h3 class="text-center mb-5"><?= $buku->nama_buku ?></h3>
                    <div class="text-center mb-3">
                        <img class="align-center" src="<?= base_url('upload/Buku/' . $buku->foto_buku) ?>" alt="">
                    </div>
                    <p>Buku ini ditulis oleh <?= $buku->nama_penulis ?> yang diterbitkan oleh <?= $buku->nama_penerbit ?>. Tidak hanya itu, buku ini di edit oleh <?= $buku->nama_editor ?> dan letaknya ada di perpustakaan tepatnya di <?= $buku->lokasi ?></p>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>