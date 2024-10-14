<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class CrudModel extends Model
{
     public $table = 'app_funcionarios';
    
    public function get($filtros = [])
    {
     $builder = $this->db->table($this->table);
     if (!empty($filtros['pesquisa_texto'])) {
          $builder->groupStart() 
                  ->like('nome', "%".$filtros['pesquisa_texto']."%")
                  ->orLike('email', "%".$filtros['pesquisa_texto']."%")
                  ->groupEnd();
      }
     if (!empty($filtros['fltroSituacao'])) {
         $builder->where('situacao', $filtros['fltroSituacao']);
     }

     $query = $builder->get();
     return $query->getResult();  
    }

    public function getById($id)
    {
         $builder = $this->db->table($this->table);
         $builder->where('id', $id);
         $query = $builder->get();
         return $query->getRow();  
    }

    public function adicionar($data)
    {
     $builder = $this->db->table($this->table);
     if ($builder->insert($data)) {
          return $this->db->insertID();
     } else {
          return false;
     }
    }

    public function editar($data)
    {
     $builder = $this->db->table($this->table);
     $builder->where('id', $data['id']);
     if ($builder->update($data)) {
          return true;
     } else {
          return false;
     }
    }

    public function deletar($id)
    {

     $builder = $this->db->table($this->table);
    
         $builder->where('id', $id);
         $builder->delete();
         
         if ($this->db->affectedRows() > 0) {
             return true;  
         } else {
             return false;
         }
 

    }

}
