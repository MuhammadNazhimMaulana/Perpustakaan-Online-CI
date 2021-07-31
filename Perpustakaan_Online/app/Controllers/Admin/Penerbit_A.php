<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Penerbit_M;
use App\Entities\Penerbit_E;


class Penerbit_A extends BaseController
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

        return view('Penerbit/view_penerbit_admin', $data);
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

        return view('Penerbit/view_specific_penerbit_admin', $data);
    }

    public function create()
    {
        if ($this->request->getPost()) {
            // Jikalau ada data di post
            $data = $this->request->getPost();
            $this->validation->run($data, 'penerbit');
            $errors = $this->validation->getErrors();

            if (!$errors) {

                // Simpan data
                $model = new Penerbit_M();

                $penerbit = new Penerbit_E();

                // Fill untuk assign value data kecuali gambar
                $penerbit->fill($data);
                $penerbit->created_at = date("Y-m-d H:i:s");

                $model->save($penerbit);

                $id_penerbit = $model->insertID();

                $segments = ['admin', 'publisher', 'view', $id_penerbit];

                // Akan redirect ke /Admin/Penerbit_A/view/$id_barang
                return redirect()->to(base_url($segments));
            }

            $this->session->setFlashdata('errors', $errors);
        }
        return view('Penerbit/create_penerbit');
    }

    public function update()
    {
        $id_penerbit = $this->request->uri->getSegment(4);

        $model = new Penerbit_M();

        $penerbit = $model->find($id_penerbit);

        $data = [
            'penerbit' => $penerbit
        ];

        if ($this->request->getPost()) {
            $data_penerbit = $this->request->getPost();
            $this->validation->run($data_penerbit, 'penerbit_update');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $publisher = new Penerbit_E();
                $publisher->id_penerbit = $id_penerbit;
                $publisher->fill($data_penerbit);

                $publisher->updated_at = date("Y-m-d H:i:s");

                $model->save($publisher);

                $segments = ['admin', 'publisher', 'view', $id_penerbit];

                return redirect()->to(base_url($segments));
            }
        }

        return view('Penerbit/update_penerbit', $data);
    }

    public function delete()
    {
        $id_penerbit = $this->request->uri->getSegment(4);

        $model = new Penerbit_M();

        $delete = $model->delete($id_penerbit);

        return redirect()->to(base_url('admin/publisher'));
    }
}
