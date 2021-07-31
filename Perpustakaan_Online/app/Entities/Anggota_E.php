<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Anggota_E extends Entity
{
    public function setPassword(string $password)
    {
        $this->attributes['password'] = md5($password);

        return $this;
    }
}
