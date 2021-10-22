<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Penulis_E extends Entity
{
    // Logika untuk menyimpan File gambar
    public function setFotoPenulis($file)
    {
        $fileName = $file->getRandomName();
        $writePath = './upload/Penulis';

        // Save ke folder uploads
        $file->move($writePath, $fileName);

        // Simpan nama file
        $this->attributes['foto_penulis'] = $fileName;
        return $this;
    }
}
