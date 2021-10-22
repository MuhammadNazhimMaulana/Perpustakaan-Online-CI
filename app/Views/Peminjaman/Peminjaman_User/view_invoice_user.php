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

    <title>Perpustakaan Online | Invoice Peminjaman User</title>
</head>

<body>
    <div style="font-size: 64px; color: '#dddddd'; "><i>Invoice</i></div>
    <p>
        <i>Bonevian Library</i><br>
        Bandung, Indonesia <br>
        048124848
    </p>
    <p>
        Peminjam : <?= $peminjaman->nama_user ?><br>
        Alamat : <?= $peminjaman->alamat_user ?><br>
        No. Peminjaman : <?= $peminjaman->id_peminjaman ?><br>
        Tanggal : <?= $peminjaman->tanggal_peminjaman ?>
    </p>
    <table cellpadding="6">
        <tr>
            <th><strong>Buku</strong></th>
            <th><strong>Tahun Terbit</strong></th>
            <th><strong>Lama Pinjam</strong></th>
        </tr>
        <tr>
            <td><?= $peminjaman->nama_buku ?></td>
            <td><?= $peminjaman->tahun_terbit ?></td>
            <td>1 Minggu</td>
        </tr>
    </table>
</body>

</html>