<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Penulis_M;
use App\Entities\Penulis_E;

class Penulis_A extends BaseController
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

        return view('Pengarang/view_penulis_admin', $data);
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

        return view('Pengarang/view_specific_penulis', $data);
    }

    public function create()
    {
        if ($this->request->getPost()) {
            // Jikalau ada data di post
            $data_penulis = $this->request->getPost();
            $this->validation->run($data_penulis, 'penulis');
            $errors = $this->validation->getErrors();
            if (!$errors) {

                // Simpan data
                $model = new Penulis_M();

                $penulis = new Penulis_E();

                // Fill untuk assign value data kecuali gambar
                $penulis->fill($data_penulis);
                $penulis->foto_penulis = $this->request->getFile('foto_penulis');
                $penulis->created_at = date("Y-m-d H:i:s");

                $model->save($penulis);

                $id_penulis = $model->insertID();

                $segments = ['admin', 'writer', 'view', $id_penulis];

                // Akan redirect ke /Admin/Penulis_A/view/$id_penulis
                return redirect()->to(base_url($segments));
            }
        }
        return view('Pengarang/create_penulis');
    }

    public function update()
    {
        $id_penulis = $this->request->uri->getSegment(4);

        $model = new Penulis_M();

        $penulis = $model->find($id_penulis);

        $data_penulis = [
            'penulis' => $penulis,
        ];

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'penulis_update');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $writer = new Penulis_E();
                $writer->id_penulis = $id_penulis;
                $writer->fill($data);

                if ($this->request->getFile('foto_penulis')->isValid()) {
                    $writer->foto_penulis = $this->request->getFile('foto_penulis');
                }

                $writer->updated_at = date("Y-m-d H:i:s");

                $model->save($writer);

                $segments = ['admin', 'writer', 'view', $id_penulis];

                return redirect()->to(base_url($segments));
            }
        }

        return view('Pengarang/update_penulis', $data_penulis);
    }

    public function delete()
    {
        $id_penulis = $this->request->uri->getSegment(4);

        $model = new Penulis_M();

        $delete = $model->delete($id_penulis);

        return redirect()->to(base_url('admin/writer'));
    }
}
