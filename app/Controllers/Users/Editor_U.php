<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\Editor_M;
use App\Entities\Editor_E;

class Editor_U extends BaseController
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

        return view('Editor/Editor_User/view_editor_user', $data);
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

        return view('Editor/Editor_User/view_specific_editor_user', $data);
    }

}

