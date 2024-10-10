<?php

namespace App\Controllers;

class Crud extends BaseController
{
    public function index(): string
    {
        $model = new \App\Models\CrudModel();
        $data = $model->get();
        var_dump($data);
        return view('crud');
    }
}
