<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Buku_M;
use App\Models\Penulis_M;
use App\Models\Editor_M;
use App\Models\Penerbit_M;
use App\Models\Rak_M;
use App\Entities\Buku_E;

class Buku_A extends BaseController
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
        $model = new Buku_M();

        // $buku = $model->findAll();

        $data = [
            "buku" => $model->join('tbl_penulis', 'tbl_penulis.id_penulis = tbl_buku.id_penulis')->join('tbl_penerbit', 'tbl_penerbit.id_penerbit = tbl_buku.id_penerbit')->join('tbl_editor', 'tbl_editor.id_editor = tbl_buku.id_editor')->join('tbl_rak', 'tbl_rak.id_rak = tbl_buku.id_rak')->paginate(3, 'buku'),
            "pager" => $model->pager,
        ];

        return view('Buku/view_buku_admin', $data);
    }

    public function view()
    {
        // Mengambil Id dari segment
        $id_buku = $this->request->uri->getSegment(4);

        $model = new Buku_M();

        $buku = $model->join('tbl_penulis', 'tbl_penulis.id_penulis = tbl_buku.id_penulis')->join('tbl_penerbit', 'tbl_penerbit.id_penerbit = tbl_buku.id_penerbit')->join('tbl_editor', 'tbl_editor.id_editor = tbl_buku.id_editor')->join('tbl_rak', 'tbl_rak.id_rak = tbl_buku.id_rak')->where('tbl_buku.id_buku', $id_buku)->first();

        $data = [
            'buku' => $buku,
        ];

        return view('Buku/view_specific_buku', $data);
    }

    public function create()
    {
        // Dapatkan Semua data
        $model_penulis = new Penulis_M();
        $penulis = $model_penulis->findAll();
        $list_penulis = [];

        // Buat looping
        foreach ($penulis as $writer) {
            $list_penulis[$writer->id_penulis] = $writer->nama_penulis;
        }

        // Dapatkan Semua data
        $model_penerbit = new Penerbit_M();
        $penerbit = $model_penerbit->findAll();
        $list_penerbit = [];

        // Buat looping
        foreach ($penerbit as $publisher) {
            $list_penerbit[$publisher->id_penerbit] = $publisher->nama_penerbit;
        }

        // Dapatkan Semua data
        $model_editor = new Editor_M();
        $editor = $model_editor->findAll();
        $list_editor = [];

        // Buat looping
        foreach ($editor as $editors) {
            $list_editor[$editors->id_editor] = $editors->nama_editor;
        }

        // Dapatkan Semua data
        $model_rak = new Rak_M();
        $rak = $model_rak->findAll();
        $list_rak = [];

        // Buat looping
        foreach ($rak as $racks) {
            $list_rak[$racks->id_rak] = $racks->lokasi;
        }

        $data = [
            'penulis' => $penulis,
            'daftar_penulis' => $list_penulis,
            'daftar_penerbit' => $list_penerbit,
            'daftar_editor' => $list_editor,
            'daftar_rak' => $list_rak,
        ];

        if ($this->request->getPost()) {
            // Jikalau ada data di post
            $data_buku = $this->request->getPost();
            $this->validation->run($data_buku, 'buku');
            $errors = $this->validation->getErrors();
            if (!$errors) {

                // Simpan data
                $model = new Buku_M();

                $buku = new Buku_E();

                // Fill untuk assign value data kecuali gambar
                $buku->fill($data_buku);
                $buku->foto_buku = $this->request->getFile('foto_buku');
                $buku->created_at = date("Y-m-d H:i:s");

                $model->save($buku);

                $id_buku = $model->insertID();

                $segments = ['admin', 'book', 'view', $id_buku];

                // Akan redirect ke /Admin/buku_A/view/$id_buku
                return redirect()->to(base_url($segments));
            }
        }
        return view('Buku/create_buku', $data);
    }

    public function update()
    {
        $id_buku = $this->request->uri->getSegment(4);

        $model = new Buku_M();

        $buku = $model->join('tbl_penulis', 'tbl_penulis.id_penulis = tbl_buku.id_penulis')->join('tbl_penerbit', 'tbl_penerbit.id_penerbit = tbl_buku.id_penerbit')->join('tbl_editor', 'tbl_editor.id_editor = tbl_buku.id_editor')->join('tbl_rak', 'tbl_rak.id_rak = tbl_buku.id_rak')->where('tbl_buku.id_buku', $id_buku)->first();

        // Dapatkan Semua data
        $model_penulis = new Penulis_M();
        $penulis = $model_penulis->findAll();
        $list_penulis = [];

        // Buat looping
        foreach ($penulis as $writer) {
            $list_penulis[$writer->id_penulis] = $writer->nama_penulis;
        }

        // Dapatkan Semua data
        $model_penerbit = new Penerbit_M();
        $penerbit = $model_penerbit->findAll();
        $list_penerbit = [];

        // Buat looping
        foreach ($penerbit as $publisher) {
            $list_penerbit[$publisher->id_penerbit] = $publisher->nama_penerbit;
        }

        // Dapatkan Semua data
        $model_editor = new Editor_M();
        $editor = $model_editor->findAll();
        $list_editor = [];

        // Buat looping
        foreach ($editor as $editors) {
            $list_editor[$editors->id_editor] = $editors->nama_editor;
        }

        // Dapatkan Semua data
        $model_rak = new Rak_M();
        $rak = $model_rak->findAll();
        $list_rak = [];

        // Buat looping
        foreach ($rak as $racks) {
            $list_rak[$racks->id_rak] = $racks->lokasi;
        }

        $data_buku = [
            'buku' => $buku,
            'daftar_penulis' => $list_penulis,
            'daftar_penerbit' => $list_penerbit,
            'daftar_editor' => $list_editor,
            'daftar_rak' => $list_rak,
        ];

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'buku_update');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $book = new Buku_E();
                $book->id_buku = $id_buku;
                $book->fill($data);

                if ($this->request->getFile('foto_buku')->isValid()) {
                    $book->foto_buku = $this->request->getFile('foto_buku');
                }

                $book->updated_at = date("Y-m-d H:i:s");

                $model->save($book);

                $segments = ['admin', 'book', 'view', $id_buku];

                return redirect()->to(base_url($segments));
            }
        }

        return view('Buku/update_buku', $data_buku);
    }

    public function delete()
    {
        $id_buku = $this->request->uri->getSegment(4);

        $model = new Buku_M();

        $delete = $model->delete($id_buku);

        return redirect()->to(base_url('admin/editor'));
    }
}
