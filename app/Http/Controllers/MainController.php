<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    public function getAll() 
    {
        $cow = app('db')->select("SELECT * FROM testcow");
        return $cow;
    }
}
