<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\Penerbit_M;
use App\Entities\Penerbit_E;


class Penerbit_U extends BaseController
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
        $model = new Penerbit_M();

        // Mencari semua data
        // $penerbit_model = $model->findAll();

        $data = [
            "penerbit" => $model->paginate(3, 'penerbit'),
            "pager" => $model->pager,
        ];

        return view('Penerbit/Penerbit_User/view_penerbit_user', $data);
    }

    public function view()
    {
        // Dapatkan Id dari segmen
        $id_penerbit = $this->request->uri->getSegment(4);

        $model = new Penerbit_M();

        $penerbit = $model->find($id_penerbit);

        // Data yang akan dikirim ke view specific
        $data = [
            "penerbit" => $penerbit
        ];

        return view('Penerbit/Penerbit_User/view_specific_penerbit_user', $data);
    }

}
