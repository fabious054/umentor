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
          $builder->groupStart()  // Agrupa as condições para evitar conflito com outras cláusulas
                  ->like('nome', "%".$filtros['pesquisa_texto']."%")
                  ->orLike('email', "%".$filtros['pesquisa_texto']."%")
                  ->groupEnd();
      }
     if (!empty($filtros['situacao'])) {
         $builder->where('situacao', $filtros['situacao']);  // Aplica a condição exata para o campo 'situacao'
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

}
