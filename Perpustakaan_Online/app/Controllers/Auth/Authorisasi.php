<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\Anggota_M;
use App\Entities\Anggota_E;

class Authorisasi extends BaseController
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

    public function register()
    {
        if ($this->request->getPost()) {

            // Validasi data yang di post
            $data = $this->request->getPost();
            $validate = $this->validation->run($data, 'register');

            $errors = $this->validation->getErrors();

            //Jika tidak ada error
            if (!$errors) {

                $model = new Anggota_M();
                $anggota = new Anggota_E();

                $anggota->username = $this->request->getPost('username');
                $anggota->nama_user = $this->request->getPost('nama_user');
                $anggota->alamat_user = $this->request->getPost('alamat_user');
                $anggota->password = $this->request->getPost('password');

                $anggota->role = 0;

                $model->save($anggota);
                return view('Auth_View/Login_View');
            }

            $this->session->setFlashdata('errors', $errors);
        }

        return view('Auth_View/Register_View');
    }

    public function login()
    {

        if ($this->request->getPost()) {

            // Validasi data yang di post
            $data = $this->request->getPost();
            $validate = $this->validation->run($data, 'login');

            $errors = $this->validation->getErrors();

            if ($errors) {
                return view('login');
            }

            $model = new Anggota_M();

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $user = $model->where('username', $username)->first();

            if ($user->password !== md5($password)) {

                $this->session->setFlashdata('errors', ['Password Salah']);
            } else {
                $session_data = [
                    'username' => $user->username,
                    'id_user' => $user->id_user,
                    'role' => $user->role,
                    'isLoggedIn' => TRUE
                ];

                $this->session->set($session_data);

                return redirect()->to(base_url('admin'));
            }
        }
        return view('Auth_View/Login_View');
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(site_url('Auth/Authorisasi/login'));
    }
}
