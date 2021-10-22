<?= $this->extend('Template/Layout_User') ?>
<?= $this->section('content') ?>

<div class="container mb-5 my-3 py-5">
    <div class="col-md-12">
        <div class="row latar" id="bookmain">
            <div class="col-sm-4">
                <div id="carousel-slide" class="carousel slide mt-3" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?= base_url('upload/Penulis/' . $penulis->foto_penulis) ?>" class="d-block w-100">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="box-back">
                    <h1 class="text-center mt-3"><?= $penulis->nama_penulis ?></h1>
                    <hr class="gelap">
                    <div class="book-information">
                        <a href="<?= site_url('user/writer') ?>" class="back">Kembali ke Daftar</a>
                        <div class="mt-3 mb-3 row">
                            <label for="Editor" class="col-sm-2 col-form-label">Usia Penulis</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Editor" readonly value="<?= $penulis->usia_penulis ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="Editor" class="col-sm-2 col-form-label">Asal Penulis</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Editor" readonly value="<?= $penulis->asal_penulis ?>">
                            </div>
                        </div>
                        <p class="description">
                            Jadi ini merupakan bagian deskripsi yang di rangkai nantinya dengan data-data buku yang masih tersisa apa saja dan ini masih bisa mengalami perubahan kok
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>