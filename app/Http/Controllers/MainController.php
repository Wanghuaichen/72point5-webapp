<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    public function getAllSamples() 
    {
        $samples = app('db')->select("SELECT * FROM sample");
		return view('layouts/home', compact('samples'));
    }
}
