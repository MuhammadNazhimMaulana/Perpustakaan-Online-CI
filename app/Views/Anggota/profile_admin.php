<?= $this->extend('Template/Layout_admin') ?>
<?= $this->section('content_admin') ?>
<div class="text">

    <div class="row justify-content-center">
        <div class="col-md-6 mt-5 ms-5">
            <div class="card">
                <h2 class="card-header text-center">Profile Admin</h2>
                <div class="card-body">
                    <h3 class="text-center mb-5"><?= $user->nama_user ?></h3>
                    <p>
                        Alamat : <?= $user->alamat_user ?>
                    </p>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end mt-3">
                        <?= form_submit('submit', 'Ubah Profile', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>