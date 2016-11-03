<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
	public function viewHome()
	{
		return view('layouts/home');
	}

    public function getAllSamples() 
    {
        return app('db')->select("SELECT * FROM sample");
    }
}
