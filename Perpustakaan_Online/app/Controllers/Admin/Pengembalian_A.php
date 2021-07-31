<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Buku_M;
use App\Models\Anggota_M;
use App\Models\Peminjaman_M;
use App\Models\Pengembalian_M;
use App\Entities\Pengembalian_E;
use App\Entities\Buku_E;

class Pengembalian_A extends BaseController
{
    public function __construct()
    {
        // Memanggil Helper
        helper('form');

        // Load Validasi
        $this->validation = \Config\Services::validation();

        // Load Session
        $this->session = session();
    }

    public function read()
    {
        $model = new Pengembalian_M();

        // $pengembalian = $model->findAll();

        $data = [
            "pengembalian" => $model->join('tbl_peminjaman', 'tbl_peminjaman.id_peminjaman = tbl_pengembalian.id_peminjaman')->join('tbl_user', 'tbl_user.id_user = tbl_pengembalian.id_user')->join('tbl_buku', 'tbl_buku.id_buku = tbl_pengembalian.id_buku')->paginate(3, 'pengembalian'),
            "pager" => $model->pager,
        ];

        return view('Pengembalian/view_pengembalian_admin', $data);
    }


    public function view()
    {
        // Mengambil Id dari segment
        $id_pengembalian = $this->request->uri->getSegment(4);

        $model = new Pengembalian_M();

        $pengembalian = $model->join('tbl_peminjaman', 'tbl_peminjaman.id_peminjaman = tbl_pengembalian.id_peminjaman')->join('tbl_user', 'tbl_user.id_user = tbl_pengembalian.id_user')->join('tbl_buku', 'tbl_buku.id_buku = tbl_pengembalian.id_buku')->where('tbl_pengembalian.id_pengembalian', $id_pengembalian)->first();

        $data = [
            'pengembalian' => $pengembalian,
        ];

        return view('Pengembalian/view_pengembalian_specific', $data);
    }

    public function create()
    {
        // Dapatkan Semua data
        $model_peminjaman = new Peminjaman_M();
        $peminjaman = $model_peminjaman->findAll();
        $list_peminjaman = [];

        // Buat looping
        foreach ($peminjaman as $borrowers) {
            $list_peminjaman[$borrowers->id_user] = $borrowers->tanggal_peminjaman;
        }

        // Dapatkan Semua data
        $model_anggota = new Anggota_M();
        $anggota = $model_anggota->findAll();
        $list_anggota = [];

        // Buat looping
        foreach ($anggota as $member) {
            $list_anggota[$member->id_user] = $member->nama_user;
        }

        // Dapatkan Semua data
        $model_buku = new Buku_M();
        $buku = $model_buku->findAll();
        $list_buku = [];

        // Buat looping
        foreach ($buku as $book) {
            $list_buku[$book->id_buku] = $book->nama_buku;
        }

        $data = [
            'daftar_peminjam' => $list_peminjaman,
            'daftar_anggota' => $list_anggota,
            'daftar_buku' => $list_buku,
        ];

        if ($this->request->getPost()) {
            // Jikalau ada data di post
            $data_pengembalian = $this->request->getPost();
            $this->validation->run($data_pengembalian, 'pengembalian');
            $errors = $this->validation->getErrors();
            if (!$errors) {

                // Simpan data
                $model = new Pengembalian_M();

                $pengembalian = new Pengembalian_E();

                // Mengurangi Jumlah Stok Karena di kurangi (Awal
                $buku = new Buku_M();
                $id_buku = $this->request->getPost('id_buku');
                $data_buku = $buku->find($id_buku);

                $entitas_buku = new Buku_E();
                $entitas_buku->id_buku = $id_buku;
                $entitas_buku->jumlah_buku = $data_buku->jumlah_buku + 1;
                $buku->save($entitas_buku);
                // Akhir

                // Fill untuk assign value data
                $pengembalian->fill($data_pengembalian);
                $pengembalian->created_at = date("Y-m-d H:i:s");

                $model->save($pengembalian);

                $id_pengembalian = $model->insertID();

                $segments = ['admin', 'return', 'view', $id_pengembalian];

                // Akan redirect ke /Admin/pengembalian_A/view/$id_pengembalian
                return redirect()->to(base_url($segments));
            }
        }
        return view('Pengembalian/create_pengembalian', $data);
    }

    public function update()
    {
        $id_pengembalian = $this->request->uri->getSegment(4);

        $model = new Pengembalian_M();

        $pengembalian = $model->join('tbl_peminjaman', 'tbl_peminjaman.id_peminjaman = tbl_pengembalian.id_peminjaman')->join('tbl_user', 'tbl_user.id_user = tbl_pengembalian.id_user')->join('tbl_buku', 'tbl_buku.id_buku = tbl_pengembalian.id_buku')->where('tbl_pengembalian.id_pengembalian', $id_pengembalian)->first();

        // Dapatkan Semua data
        $model_peminjaman = new Peminjaman_M();
        $peminjaman = $model_peminjaman->findAll();
        $list_peminjaman = [];

        // Buat looping
        foreach ($peminjaman as $borrowers) {
            $list_peminjaman[$borrowers->id_peminjaman] = $borrowers->tanggal_peminjaman;
        }

        // Dapatkan Semua data
        $model_anggota = new Anggota_M();
        $anggota = $model_anggota->findAll();
        $list_anggota = [];

        // Buat looping
        foreach ($anggota as $member) {
            $list_anggota[$member->id_user] = $member->nama_user;
        }

        // Dapatkan Semua data
        $model_buku = new Buku_M();
        $buku = $model_buku->findAll();
        $list_buku = [];

        // Buat looping
        foreach ($buku as $book) {
            $list_buku[$book->id_buku] = $book->nama_buku;
        }

        $data_pengembalian = [
            'pengembalian' => $pengembalian,
            'daftar_peminjam' => $list_peminjaman,
            'daftar_anggota' => $list_anggota,
            'daftar_buku' => $list_buku,
        ];

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'pengembalian_update');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $pengembalian = new Pengembalian_E();
                $pengembalian->id_pengembalian = $id_pengembalian;
                $pengembalian->fill($data);

                $pengembalian->updated_at = date("Y-m-d H:i:s");

                $model->save($pengembalian);

                $segments = ['admin', 'return', 'view', $id_pengembalian];

                return redirect()->to(base_url($segments));
            }
        }

        return view('Pengembalian/update_pengembalian', $data_pengembalian);
    }

    public function delete()
    {
        $id_pengembalian = $this->request->uri->getSegment(4);

        $model = new Pengembalian_M();

        $delete = $model->delete($id_pengembalian);

        return redirect()->to(base_url('admin/return'));
    }
}
