<?= $this->extend('Template/Layout_User') ?>
<?= $this->section('content') ?>
<?php
if (isset($_GET['page_penerbit'])) {
    $page = $_GET['page_penerbit'];
    $jumlah = 3;
    $i = ($jumlah * $page) - $jumlah + 1;
} else {
    $i = 1;
}
?>

<div class="container mt-5 tinggi">
    <h1 class="text-center coba">Editor</h1>
    <hr class="dark">

    <table class="test">
        <tr id="header">
            <th>No</th>
            <th>Nama Penerbit</th>
            <th>Alamat Penerbit</th>
            <th>Tahun Berdiri</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($penerbit as $index => $publisher) : ?>
        <tr>
            <th><?= $i++ ?></th>
            <th><?= $publisher->nama_penerbit ?></th>
            <th><?= $publisher->alamat_penerbit ?></th>
            <th><?= $publisher->tahun_berdiri ?></th>
            <th><a href="<?= base_url('user/publisher/view/' . $publisher->id_penerbit) ?>" class="btn btn-primary">View</a></th>
        </tr>
        <?php endforeach ?>
    </table>
    <?= $pager->links('penerbit', 'custom_pagination') ?>
</div>
<?= $this->endSection() ?>