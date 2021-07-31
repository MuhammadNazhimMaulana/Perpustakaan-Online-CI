<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Buku_M;
use App\Models\Peminjaman_M;
use App\Models\Pengembalian_M;

class Utama_A extends BaseController
{
    public function index()
    {
        $model_buku = new Buku_M();
        $model_peminjaman = new Peminjaman_M();
        $model_pengembalian = new Pengembalian_M();

        $pinjam_per_kategori = $model_peminjaman->select('COUNT(tbl_peminjaman.id_peminjaman) AS jumlah, tbl_user.nama_user AS user')
            ->join('tbl_user', 'tbl_peminjaman.id_user=tbl_user.id_user')
            ->groupBy('tbl_peminjaman.id_user')
            ->get();

        $pengembalian_per_kategori = $model_pengembalian->select('COUNT(tbl_pengembalian.id_pengembalian) AS kembali, tbl_user.nama_user AS user')
            ->join('tbl_user', 'tbl_pengembalian.id_user=tbl_user.id_user')
            ->groupBy('tbl_pengembalian.id_user')
            ->get();

        $kategori_buku = $model_buku->select('COUNT(tbl_buku.nama_buku) AS tanggal, COUNT(tbl_buku.id_buku) AS jumlah')
            ->groupBy('DAY(tbl_buku.nama_buku)')
            ->get();

        $data = [
            "buku" => $model_buku->like('nama_buku')->countAllResults(),
            "peminjaman" => $model_peminjaman->like('tanggal_peminjaman')->countAllResults(),
            "pengembalian" => $model_pengembalian->like('tanggal_pengembalian')->countAllResults(),
            "pinjam_per_kategori" => $pinjam_per_kategori,
            "pengembalian_per_kategori" => $pengembalian_per_kategori,
            "kategori_buku" => $kategori_buku,
        ];

        return view('Template/Dashboard/Dashboard_admin', $data);
    }
}
