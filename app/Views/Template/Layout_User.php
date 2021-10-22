<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Online | User</title>

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Bootstrap CSS Custom -->
    <link href="<?= base_url('Tampilan/navbar_home.css') ?>" rel="stylesheet">
    <link href="<?= base_url('Tampilan/dashboard_user.css') ?>" rel="stylesheet">

    <!-- Font awesome -->
    <link href="<?= base_url('fontawesome/css_fontawesome/all.css') ?>" rel="stylesheet">

</head>

<body>
    <?= $this->include('Template/Navbar/Navbar_Home') ?>

    <?= $this->renderSection('content') ?>

    <?= $this->include('Template/Footer/Footer.php') ?>

    <!-- JavaScript -->
    <script src="<?= base_url('bootstrap/js/bootstrap.min.js') ?>"></script>

</body>

</html>