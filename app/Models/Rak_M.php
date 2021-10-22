<?php

namespace App\Models;

use CodeIgniter\Model;

class Rak_M extends Model
{
    protected $table         = 'tbl_rak';
    protected $primaryKey = 'id_rak';
    protected $allowedFields = ['lokasi', 'created_at', 'updated_at'];
    protected $returnType    = 'App\Entities\Rak_E';
    protected $useTimestamps = true;
}
