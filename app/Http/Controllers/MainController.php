<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
	public function viewHome()
	{
		return view('layouts/home');
	}

    public function getAllRawSamples() 
    {
        return app('db')->select("SELECT * FROM sample");
    }

	public function newRawSample(Request $request)
	{
		$data = $request->input();
		foreach ($data as $key => $value) {
			/*** IN HERE WE CAN DO VALIDATION OF INPUTS ***/
		}

		app('db')->table('sample')->insert([
			[
				'body_temp' => $data['body_temp'],
				'ext_temp'  => $data['ext_temp'],
				'x'			=> $data['x'],
				'y'			=> $data['y'],
				'z'			=> $data['z'],
				'respire'	=> $data['respire'],
				'cow_id'	=> $data['cow_id'],
				'error'		=> $data['error']
			]	
		]);
	}
}
