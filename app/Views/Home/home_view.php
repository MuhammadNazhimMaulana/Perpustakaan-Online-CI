<?= $this->extend('Template/Layout_Home') ?>
<?= $this->section('Home') ?>

<!-- Bagian Banner -->
<section id="banner">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p class="promo-title">Peminjaman Buku</p>
                <p>Silakan lakukan peminjaman ditempat kami</p>
                <a href="<?= base_url("login"); ?>"><img src="<?= base_url('img/Book.png') ?>" class="play-btn">Borrowing Books</a>
            </div>
            <div class="col-md-6 text-center">
                <img src="<?= base_url('img/Borrow.png') ?>" class="img-fluid">
            </div>
        </div>
    </div>

    <img src="<?= base_url('img/wave_1.png') ?>" class="bottom-img">

</section>

<!-- Bagian Layanan -->

<section id="layanan">
    <div class="container text-center">
        <h1 class="title">Apa Layanan Kami?</h1>
        <div class="row text-center">
            <div class="col-md-6 services">
                <img src="<?= base_url('img/peminjaman.png') ?>" class="service-img">
                <h4>Peminjaman Buku</h4>
                <p>Peminjaman buku bisa di lakukan melalui website ini</p>
            </div>
            <div class="col-md-6 services">
                <img src="<?= base_url('img/peminjaman.png') ?>" class="service-img">
                <h4>Peminjaman Buku</h4>
                <p>Peminjaman buku bisa di lakukan melalui website ini</p>
            </div>
        </div>
        <button type="button" class="btn btn-primary">Semua Layanan</button>
    </div>
</section>

<!-- Bagian About -->
<section id="about-us">
    <div class="container">
        <h1 class="title text-center">Kenapa Memlih Kami?</h1>
        <div class="row">
            <div class="col-md-6 about-us">
                <p class="about-title">Apa yang membuat Berbeda</p>
                <ul>
                    <li>Ini adalah keunggulan Kami</li>
                    <li>Ini adalah keunggulan Kami</li>
                    <li>Ini adalah keunggulan Kami</li>
                    <li>Ini adalah keunggulan Kami</li>
                </ul>
            </div>
            <div class="col-md-6">
                <img src="<?= base_url('img/Book Front.png') ?>" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<!-- Bagian Sosial Media -->
<section id="social-media">
    <div class="container text-center">
        <p>Berikut Adalah Sosial Media Saya</p>
        <div class="social-icons">
            <a href="#"><img src="<?= base_url('img/FB.png') ?>"></a>
            <a href="#"><img src="<?= base_url('img/IG.png') ?>"></a>
            <a href="#"><img src="<?= base_url('img/Twitter.png') ?>"></a>
            <a href="#"><img src="<?= base_url('img/SC.png') ?>"></a>
            <a href="#"><img src="<?= base_url('img/WA.png') ?>"></a>
            <a href="#"><img src="<?= base_url('img/idn.png') ?>"></a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>