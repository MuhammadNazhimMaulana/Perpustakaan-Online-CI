<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #000000;
            text-align: center;
        }
    </style>

    <title>Perpustakaan Online | Invoice Pengembalian User</title>
</head>

<body>
    <div style="font-size: 64px; color: '#dddddd'; "><i>Invoice</i></div>
    <p>
        <i>Bonevian Library</i><br>
        Bandung, Indonesia <br>
        048124848
    </p>
    <p>
        Peminjam : <?= $pengembalian->nama_user ?><br>
        Alamat : <?= $pengembalian->alamat_user ?><br>
        No. Pengembalian : <?= $pengembalian->id_pengembalian ?><br>
        Tanggal : <?= $pengembalian->tanggal_pengembalian ?>
    </p>
    <table cellpadding="6">
        <tr>
            <th><strong>Buku</strong></th>
            <th><strong>Tahun Terbit</strong></th>
            <th><strong>Denda</strong></th>
            <th><strong>Keterangan</strong></th>
        </tr>
        <tr>
            <td><?= $pengembalian->nama_buku ?></td>
            <td><?= $pengembalian->tahun_terbit ?></td>
            <td><?= $pengembalian->denda ?></td>
            <td><?= $pengembalian->ket_pengembalian ?></td>
        </tr>
    </table>
</body>

</html>