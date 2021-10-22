<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Editor_M;
use App\Entities\Editor_E;

class Editor_A extends BaseController
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
        $model = new Editor_M();

        //Dapat semua data
        // $editor = $model->findAll();

        $data = [
            "editor" => $model->paginate(3, 'editor'),
            "pager" => $model->pager,
        ];

        return view('Editor/view_editor_admin', $data);
    }

    public function view()
    {
        // Mengambil Id dari segment
        $id_editor = $this->request->uri->getSegment(4);

        $model = new Editor_M();

        $editor = $model->find($id_editor);

        $data = [
            'editor' => $editor,
        ];

        return view('Editor/view_specific_editor', $data);
    }

    public function create()
    {
        if ($this->request->getPost()) {
            // Jikalau ada data di post
            $data_editor = $this->request->getPost();
            $this->validation->run($data_editor, 'editor');
            $errors = $this->validation->getErrors();
            if (!$errors) {

                // Simpan data
                $model = new Editor_M();

                $editor = new Editor_E();

                // Fill untuk assign value data kecuali gambar
                $editor->fill($data_editor);
                $editor->foto_editor = $this->request->getFile('foto_editor');
                $editor->created_at = date("Y-m-d H:i:s");

                $model->save($editor);

                $id_editor = $model->insertID();

                $segments = ['admin', 'editor', 'view', $id_editor];

                // Akan redirect ke /Admin/Editor_A/view/$id_editor
                return redirect()->to(base_url($segments));
            }
        }
        return view('Editor/create_editor');
    }

    public function update()
    {
        $id_editor = $this->request->uri->getSegment(4);

        $model = new Editor_M();

        $editor = $model->find($id_editor);

        $data_editor = [
            'editor' => $editor,
        ];

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'editor_update');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $editor = new Editor_E();
                $editor->id_editor = $id_editor;
                $editor->fill($data);

                if ($this->request->getFile('foto_editor')->isValid()) {
                    $editor->foto_editor = $this->request->getFile('foto_editor');
                }

                $editor->updated_at = date("Y-m-d H:i:s");

                $model->save($editor);

                $segments = ['admin', 'editor', 'view', $id_editor];

                return redirect()->to(base_url($segments));
            }
        }

        return view('Editor/update_editor', $data_editor);
    }

    public function delete()
    {
        $id_editor = $this->request->uri->getSegment(4);

        $model = new Editor_M();

        $delete = $model->delete($id_editor);

        return redirect()->to(base_url('admin/editor'));
    }
}
