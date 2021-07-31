<?= $this->extend('Template/Layout_Auth') ?>
<?= $this->section('konten') ?>

<?php
$username = [
    'name' => 'username',
    'id' => 'username',
    'value' => null,
    'class' => 'form-control'
];

$password = [
    'name' => 'password',
    'id' => 'password',
    'class' => 'form-control'
];

$session = session();
$errors = $session->getFlashdata('errors');
?>

<div class="container mt-4 vh-100">
    <div class="row justify-content-center h-100">
        <div class="card w-25 my-auto">
            <div class="card-header text-center">
                <h1>Login</h1>

            </div>
            <div class="card-body">

                <?php if ($errors != null) : ?>
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Terjadi Kesalahan</h4>
                        <hr>
                        <p class="mb-0">
                            <?php foreach ($errors as $err) {
                                echo $err . '<br>';
                            }

                            ?>
                        </p>
                    </div>
                <?php endif ?>

                <!-- Membuat Form dengan Form Helper -->
                <?= form_open('Auth/Authorisasi/login') ?>
                <div class="form-group mt-3">
                    <?= form_label("Username", "username") ?>
                    <?= form_input($username) ?>
                </div>
                <div class="form-group mt-3">
                    <?= form_label("Password", "password") ?>
                    <?= form_password($password) ?>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <?= form_submit('submit', 'Submit', ['class' => 'btn btn-primary w-100']) ?>
                </div>

            </div>
            <div class="card-footer">
                <a href="<?= base_url('register') ?>"><small>Ingin mendaftar?</small></a>
            </div>
        </div>
    </div>

    <?= form_close() ?>

</div>



<?= $this->endSection() ?>