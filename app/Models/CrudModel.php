<?php

namespace App\Models;

use CodeIgniter\Model;

class CrudModel extends Model
{
    public function get()
    {
        return [
            'name' => 'João',
            'email' => ' email@email',
            'phone' => '11 99999-9999'
        ];

    }
}
