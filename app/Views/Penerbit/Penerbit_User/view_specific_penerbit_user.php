<?= $this->extend('Template/Layout_User') ?>
<?= $this->section('content') ?>

<div class="container mb-5 my-3 py-5">
    <div class="col-md-12">
        <div class="row latar" id="bookmain">
            <div class="col-sm-12">
                <div class="box-back">
                    <h1 class="text-center mt-3"><?= $penerbit->nama_penerbit ?></h1>
                    <hr class="gelap">
                    <div class="book-information">
                        <a href="<?= base_url('user/publisher') ?>" class="back">Kembali ke Daftar</a>
                        <div class="mt-3 mb-3 row">
                            <label for="penerbit" class="col-sm-2 col-form-label">Alamat Penerbit</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="penerbit" readonly value="<?= $penerbit->alamat_penerbit ?>">
                            </div>
                        </div>
                        <div class="mt-3 mb-3 row">
                            <label for="penerbit" class="col-sm-2 col-form-label">Tahun Berdiri</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="penerbit" readonly value="<?= $penerbit->tahun_berdiri ?>">
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