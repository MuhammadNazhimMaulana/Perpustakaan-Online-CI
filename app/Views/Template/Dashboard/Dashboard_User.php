<?= $this->extend('Template/Layout_User') ?>
<?= $this->section('content') ?>

<div class="container welcome">
    <h1 style="color: black;">Selamat Datang <?php
                                                echo session()->get('username');
                                                ?></h1>
    <div class="clock mt-5" id="MyClockDisplay">
        <!-- JavaScript Jam-->
        <script src="<?= base_url('Tampilan/JS/clock.js') ?>"></script>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card border-light mb-3">
                <div class="card-header text-center">Header</div>
                <div class="card-body">
                    <h5 class="card-title">Light card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>