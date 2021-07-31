<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Rak_M;
use App\Entities\Rak_E;


class Rak_A extends BaseController
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
        $model = new Rak_M();
        // Mencari semua data
        // $rak_model = $model->findAll();

        $data = [
            "rak" => $model->paginate(3, 'rak'),
            "pager" => $model->pager,
        ];

        return view('Rak/view_rak_admin', $data);
    }

    public function view()
    {
        // Dapatkan Id dari segmen
        $id_rak = $this->request->uri->getSegment(4);

        $model = new Rak_M();

        $rak = $model->find($id_rak);

        // Data yang akan dikirim ke view specific
        $data = [
            "rak" => $rak
        ];

        return view('Rak/view_specific_rak_admin', $data);
    }

    public function create()
    {
        if ($this->request->getPost()) {
            // Jikalau ada data di post
            $data = $this->request->getPost();
            $this->validation->run($data, 'rak');
            $errors = $this->validation->getErrors();

            if (!$errors) {

                // Simpan data
                $model = new Rak_M();

                $rak = new Rak_E();

                // Fill untuk assign value data kecuali gambar
                $rak->fill($data);
                $rak->created_at = date("Y-m-d H:i:s");

                $model->save($rak);

                $id_rak = $model->insertID();

                $segments = ['admin', 'rack', 'view', $id_rak];

                // Akan redirect ke /Admin/Rak_A/view/$id_barang
                return redirect()->to(base_url($segments));
            }

            $this->session->setFlashdata('errors', $errors);
        }
        return view('Rak/create_rak');
    }

    public function update()
    {
        $id_rak = $this->request->uri->getSegment(4);

        $model = new Rak_M();

        $rak = $model->find($id_rak);

        $data = [
            'rak' => $rak
        ];

        if ($this->request->getPost()) {
            $data_rak = $this->request->getPost();
            $this->validation->run($data_rak, 'rak_update');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $rack = new Rak_E();
                $rack->id_rak = $id_rak;
                $rack->fill($data_rak);

                $rack->updated_at = date("Y-m-d H:i:s");

                $model->save($rack);

                $segments = ['admin', 'rack', 'view', $id_rak];

                return redirect()->to(base_url($segments));
            }
        }

        return view('Rak/update_rak', $data);
    }

    public function delete()
    {
        $id_rak = $this->request->uri->getSegment(4);

        $model = new Rak_M();

        $delete = $model->delete($id_rak);

        return redirect()->to(base_url('admin/rack'));
    }
}
