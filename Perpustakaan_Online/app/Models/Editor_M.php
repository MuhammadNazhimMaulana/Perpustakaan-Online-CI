<?php

namespace App\Models;

use CodeIgniter\Model;

class Editor_M extends Model
{
    protected $table         = 'tbl_editor';
    protected $primaryKey = 'id_editor';
    protected $allowedFields = ['nama_editor', 'email_editor', 'foto_editor', 'created_at', 'updated_at'];
    protected $returnType    = 'App\Entities\Editor_E';
    protected $useTimestamps = true;
}
