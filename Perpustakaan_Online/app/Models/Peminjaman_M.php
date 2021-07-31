<?php

namespace App\Models;

use CodeIgniter\Model;

class Peminjaman_M extends Model
{
    protected $table         = 'tbl_peminjaman';
    protected $primaryKey = 'id_peminjaman';
    protected $allowedFields = ['id_user', 'id_buku', 'tanggal_peminjaman', 'created_at', 'updated_at'];
    protected $returnType    = 'App\Entities\Peminjaman_E';
    protected $useTimestamps = true;
}
