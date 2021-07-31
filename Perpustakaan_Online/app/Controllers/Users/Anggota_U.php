<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\Anggota_M;
use App\Entities\Anggota_E;



class Anggota_U extends BaseController
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

    public function profile()
    {
        // Mengambil Id dari segment
        $id_user = $this->session->get('id_user');

        $model = new Anggota_M();

        $user = $model->find($id_user);

        $data = [
            'user' => $user,
        ];

        return view('Anggota/Users_Profile/profile_user', $data);
    }
}
