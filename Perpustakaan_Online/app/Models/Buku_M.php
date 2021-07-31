<?php

namespace App\Models;

use CodeIgniter\Model;

class Buku_M extends Model
{
    protected $table         = 'tbl_buku';
    protected $primaryKey = 'id_buku';
    protected $allowedFields = ['id_penulis', 'id_penerbit', 'id_editor', 'id_rak', 'nama_buku', 'jumlah_buku', 'tahun_terbit', 'foto_buku', 'created_at', 'updated_at'];
    protected $returnType    = 'App\Entities\Buku_E';
    protected $useTimestamps = true;
}
