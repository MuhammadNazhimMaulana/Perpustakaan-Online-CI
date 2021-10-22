<?php

namespace App\Models;

use CodeIgniter\Model;

class Penerbit_M extends Model
{
    protected $table         = 'tbl_penerbit';
    protected $primaryKey = 'id_penerbit';
    protected $allowedFields = ['nama_penerbit', 'alamat_penerbit', 'tahun_berdiri', 'created_at', 'updated_at'];
    protected $returnType    = 'App\Entities\Penerbit_E';
    protected $useTimestamps = true;
}
