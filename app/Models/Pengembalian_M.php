<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengembalian_M extends Model
{
    protected $table         = 'tbl_pengembalian';
    protected $primaryKey = 'id_pengembalian';
    protected $allowedFields = ['id_peminjaman', 'id_user', 'id_buku', 'tanggal_pengembalian', 'denda', 'ket_pengembalian', 'created_at', 'updated_at'];
    protected $returnType    = 'App\Entities\Pengembalian_E';
    protected $useTimestamps = true;
}
