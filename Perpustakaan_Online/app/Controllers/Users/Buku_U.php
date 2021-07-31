<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\Buku_M;
use App\Models\Penulis_M;
use App\Models\Editor_M;
use App\Models\Penerbit_M;
use App\Models\Rak_M;
use App\Entities\Buku_E;

class Buku_U extends BaseController
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

        return view('Buku/view_buku_user', $data);
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

        return view('Buku/view_specific_buku_user', $data);
    }
}
