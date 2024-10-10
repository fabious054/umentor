<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class CrudModel extends Model
{
     public $table = 'app_funcionarios';
    
    public function get()
    {
         $builder = $this->db->table($this->table);
         $query = $builder->get();
         return $query->getResult();  
    }
}
