<?= $this->extend('Template/Layout_User') ?>
<?= $this->section('content') ?>

<div class="container mb-5 my-3 py-5">
    <div class="col-md-12">
        <div class="row latar" id="bookmain">
            <div class="col-sm-4">
                <div id="carousel-slide" class="carousel slide mt-3" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?= base_url('upload/Buku/' . $pengembalian->foto_buku) ?>" class="d-block w-100">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="box-back">
                    <h1 class="text-center mt-3"><?= $pengembalian->nama_buku ?></h1>
                    <hr class="gelap">
                    <div class="book-information">
                        <a href="<?= base_url('user/return') ?>" class="back">Kembali ke Daftar</a>
                        <div class="mb-3 row mt-3">
                            <label for="Peminjam" class="col-sm-2 col-form-label">Nama Pengembali</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Peminjam" readonly value="<?= $pengembalian->nama_user ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="Editor" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Editor" readonly value="<?= $pengembalian->tanggal_peminjaman ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="Editor" class="col-sm-2 col-form-label">Tanggal Pengembalian</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Editor" readonly value="<?= $pengembalian->tanggal_pengembalian ?>">
                            </div>
                        </div>
                        <p class="description">
                            Jadi ini merupakan bagian deskripsi yang di rangkai nantinya dengan data-data buku yang masih tersisa apa saja dan ini masih bisa mengalami perubahan kok
                        </p>
                        <a href="<?= site_url('user/return/pdf/' . $pengembalian->id_pengembalian) ?>" class="btn btn-primary">Pdf</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>