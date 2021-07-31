<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Buku_M;
use App\Models\Anggota_M;
use App\Models\Peminjaman_M;
use App\Entities\Peminjaman_E;
use App\Entities\Buku_E;

class Peminjaman_A extends BaseController
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
        $model = new Peminjaman_M();

        // Get all data
        // $peminjaman = $model->findAll();

        $data = [
            "peminjaman" => $model->join('tbl_user', 'tbl_user.id_user = tbl_peminjaman.id_user')->join('tbl_buku', 'tbl_buku.id_buku = tbl_peminjaman.id_buku')->paginate(3, 'peminjaman'),
            "pager" => $model->pager,
        ];

        return view('Peminjaman/view_peminjaman_admin', $data);
    }


    public function view()
    {
        // Mengambil Id dari segment
        $id_peminjaman = $this->request->uri->getSegment(4);

        $model = new Peminjaman_M();

        $peminjaman = $model->join('tbl_user', 'tbl_user.id_user = tbl_peminjaman.id_user')->join('tbl_buku', 'tbl_buku.id_buku = tbl_peminjaman.id_buku')->where('tbl_peminjaman.id_peminjaman', $id_peminjaman)->first();

        $data = [
            'peminjaman' => $peminjaman,
        ];

        return view('Peminjaman/view_peminjaman_specific', $data);
    }

    public function create()
    {
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
            'daftar_anggota' => $list_anggota,
            'daftar_buku' => $list_buku,
        ];

        if ($this->request->getPost()) {
            // Jikalau ada data di post
            $data_peminjam = $this->request->getPost();
            $this->validation->run($data_peminjam, 'peminjaman');
            $errors = $this->validation->getErrors();
            if (!$errors) {

                // Simpan data
                $model = new Peminjaman_M();

                $peminjam = new Peminjaman_E();

                // Mengurangi Jumlah Stok Karena di kurangi (Awal
                $buku = new Buku_M();
                $id_buku = $this->request->getPost('id_buku');
                $data_buku = $buku->find($id_buku);

                $entitas_buku = new Buku_E();
                $entitas_buku->id_buku = $id_buku;
                $entitas_buku->jumlah_buku = $data_buku->jumlah_buku - 1;
                $buku->save($entitas_buku);
                // Akhir

                // Fill untuk assign value data
                $peminjam->fill($data_peminjam);
                $peminjam->created_at = date("Y-m-d H:i:s");

                $model->save($peminjam);

                $id_peminjam = $model->insertID();

                $segments = ['admin', 'borrow', 'view', $id_peminjam];

                // Akan redirect ke /Admin/peminjam_A/view/$id_peminjam
                return redirect()->to(base_url($segments));
            }
        }
        return view('Peminjaman/create_peminjam', $data);
    }

    public function update()
    {
        $id_peminjaman = $this->request->uri->getSegment(4);

        $model = new Peminjaman_M();

        $peminjaman = $model->join('tbl_user', 'tbl_user.id_user = tbl_peminjaman.id_user')->join('tbl_buku', 'tbl_buku.id_buku = tbl_peminjaman.id_buku')->where('tbl_peminjaman.id_peminjaman', $id_peminjaman)->first();

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

        $data_peminjam = [
            'peminjaman' => $peminjaman,
            'daftar_anggota' => $list_anggota,
            'daftar_buku' => $list_buku,
        ];

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'peminjaman_update');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $peminjaman = new Peminjaman_E();
                $peminjaman->id_peminjaman = $id_peminjaman;
                $peminjaman->fill($data);

                $peminjaman->updated_at = date("Y-m-d H:i:s");

                $model->save($peminjaman);

                $segments = ['admin', 'borrow', 'view', $id_peminjaman];

                return redirect()->to(base_url($segments));
            }
        }

        return view('Peminjaman/update_peminjaman', $data_peminjam);
    }

    public function delete()
    {
        $id_peminjaman = $this->request->uri->getSegment(4);

        $model = new Peminjaman_M();

        $delete = $model->delete($id_peminjaman);

        return redirect()->to(base_url('admin/borrow'));
    }
}
