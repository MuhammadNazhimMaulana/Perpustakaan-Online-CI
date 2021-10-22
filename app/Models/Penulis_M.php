<?php

namespace App\Models;

use CodeIgniter\Model;

class Penulis_M extends Model
{
    protected $table         = 'tbl_penulis';
    protected $primaryKey = 'id_penulis';
    protected $allowedFields = ['nama_penulis', 'usia_penulis', 'asal_penulis', 'foto_penulis', 'created_at', 'updated_at'];
    protected $returnType    = 'App\Entities\Penulis_E';
    protected $useTimestamps = true;
}
