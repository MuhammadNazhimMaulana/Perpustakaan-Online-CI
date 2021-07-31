<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Online | Admin</title>

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Bootstrap CSS Custom -->
    <link href="<?= base_url('Tampilan/navbar_admin.css') ?>" rel="stylesheet">
    <link href="<?= base_url('Tampilan/dashboard_admin.css') ?>" rel="stylesheet">

    <!-- Box Icon CDN -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

    <?= $this->include('Template/Navbar/Navbar_Admin') ?>

    <div class="home_content">
        <?= $this->renderSection('content_admin') ?>
    </div>

    <!-- JavaScript -->
    <script src="<?= base_url('bootstrap/js/bootstrap.min.js') ?>"></script>



</body>

</html>