<?php

namespace App\Controllers;

use App\Models\CrudModel; 

class Crud extends BaseController
{
    public function index(): string
    {
        $model = new CrudModel();
        $filtros = $_GET;
    
        $filtrar_por = [
            "pesquisa_texto" => (isset($filtros["pesquisa_texto"]) && !empty($filtros["pesquisa_texto"])) ? $filtros["pesquisa_texto"] : false,
            "situacao" => (isset($filtros["situacao"]) && !empty($filtros["situacao"])) ? $filtros["situacao"] : false,
        ];

        $data = $model->get($filtrar_por);
        return view("crud", [
            "data"=> $data,
            "filtros"=> $filtrar_por
            ]);
    }

    public function adicionar()
    {
        $model = new CrudModel();
        $data = $_POST;
        
        $criado_em = date("Y-m-d", strtotime("now"));
        $ultima_att = date("Y-m-d", strtotime("now"));

        $data["criado_em"] = $criado_em;
        $data["ultima_atualizacao"] = $ultima_att;

        $retorno = $model->adicionar($data);
        $data["id"] = $retorno;
        $data = json_encode($data);

        if(!$retorno){
            return json_encode(["status"=>false, "msg"=>"Erro ao adicionar funcionário"]);
        }else{
            return json_encode(["status"=>true,"msg"=> "Funcionário adicionado com sucesso","data"=>$data]);
        }

    }
    public function editar()
    {
        $model = new CrudModel();
        $data = $_POST;
        $ultima_att = date("Y-m-d", strtotime("now"));

        $data["ultima_atualizacao"] = $ultima_att;

        $retorno = $model->editar($data);
        $data = json_encode($data);

        if(!$retorno){
            return json_encode(["status"=>false, "msg"=>"Erro ao editar funcionário"]);
        }else{
            return json_encode(["status"=>true,"msg"=> "Funcionário editado com sucesso","data"=>$data]);
        }
    }

    public function buscar()
    {
        $model = new CrudModel();
        $id = $_GET["id"];

        $data = $model->getById($id);
        
        if(!$data){
            return json_encode(["status"=>false,"msg"=> "
            Funcionário não encontrado"]);
        }else{
            return json_encode(["status"=>true,"msg"=> "Funcionário encontrado","data"=>$data]);
        }

    }
}
