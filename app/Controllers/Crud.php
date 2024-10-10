<?php

namespace App\Controllers;

use App\Models\CrudModel; 

class Crud extends BaseController
{
    public function index(): string
    {
        $model = new CrudModel();
        $data = $model->get();
        return view("crud", [
            "data"=> $data
            ]);
    }
}
