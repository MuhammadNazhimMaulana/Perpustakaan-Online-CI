<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\Penulis_M;
use App\Entities\Penulis_E;

class Penulis_U extends BaseController
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
        $model = new Penulis_M();

        // Mencari Data
        // $penulis = $model->findAll();

        $data = [
            "penulis" => $model->paginate(3, 'penulis'),
            "pager" => $model->pager,
        ];

        return view('Pengarang/Pengarang_User/view_penulis_user', $data);
    }

    public function view()
    {
        // Mengambil Id dari segment
        $id_penulis = $this->request->uri->getSegment(4);

        $model = new Penulis_M();

        $penulis = $model->find($id_penulis);

        $data = [
            'penulis' => $penulis,
        ];

        return view('Pengarang/Pengarang_User/view_specific_penulis_user', $data);
    }

}
