<?php

namespace App\Models;

use CodeIgniter\Model;

class Anggota_M extends Model
{
    protected $table         = 'tbl_user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['username', 'nama_user', 'alamat_user', 'password', 'role', 'created_at', 'updated_at'];
    protected $returnType    = 'App\Entities\Anggota_E';
    protected $useTimestamps = true;
}
