<!-- Awal Navbar -->

<section id="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="<?= base_url('img/Logo.png') ?>"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <?php if (session()->get('isLoggedIn') == False) : ?>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#banner">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#layanan">Layanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about-us">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#social-media">Kontak</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#footer">Gabung</a>
                        </li>
                    </ul>
                <?php endif ?>
                <?php if (session()->get('isLoggedIn') == True) : ?>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('user') ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('user/profile') ?>">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('user/book') ?>">Buku</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('user/borrow') ?>">Peminjaman</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('user/return') ?>">Pengembalian</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('user/writer') ?>">Penulis</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('user/publisher') ?>">Penerbit</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('user/editor') ?>">Editor</a>
                        </li>
                    </ul>
                <?php endif ?>
            </div>
        </div>
    </nav>
</section>

<!-- Akhir Navbar -->