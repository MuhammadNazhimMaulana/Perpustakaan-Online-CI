<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Editor_E extends Entity
{
    // Logika untuk menyimpan File gambar
    public function setFotoEditor($file)
    {
        $fileName = $file->getRandomName();
        $writePath = './upload/Editor';

        // Save ke folder uploads
        $file->move($writePath, $fileName);

        // Simpan nama file
        $this->attributes['foto_editor'] = $fileName;
        return $this;
    }
}
