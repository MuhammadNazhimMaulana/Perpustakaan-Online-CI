<?= $this->extend('Template/Layout_User') ?>
<?= $this->section('content') ?>

<div class="container mt-5 tinggi">
    <div class="pelapis">
        <div class="kiri">
            <img src="<?= base_url('img/Borrow.png') ?>" width="100" >
            <h4><?= $user->username ?></h4>
        </div>
        <div class="kanan">
            <div class="info">
                <h3>Informasi Profil</h3>
                <div class="data-informasi">
                    <div class="data">
                        <h4>Nama user</h4>
                        <p><?= $user->nama_user ?></p>
                    </div>
                    <div class="data">
                        <h4>Alamat user</h4>
                        <p><?= $user->alamat_user ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>