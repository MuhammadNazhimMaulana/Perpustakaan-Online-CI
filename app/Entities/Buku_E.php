<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Buku_E extends Entity
{
    // Logika untuk menyimpan File gambar
    public function setFotoBuku($file)
    {
        $fileName = $file->getRandomName();
        $writePath = './upload/Buku';

        // Save ke folder uploads
        $file->move($writePath, $fileName);

        // Simpan nama file
        $this->attributes['foto_buku'] = $fileName;
        return $this;
    }
}
