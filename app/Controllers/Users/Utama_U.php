<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;


class Utama_U extends BaseController
{
    public function index()
    {
        return view('Template/Dashboard/Dashboard_User');
    }
}
