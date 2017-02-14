<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
	public function viewHome()
	{
		return view('layouts/home');
	}

    public function getNormalSamples() 
    {
		$maxSamples = 10;
        return app('db')->select("SELECT * FROM normal_sample ORDER BY timestamp ASC LIMIT {$maxSamples}");
    }

    public function getAccelSamples() 
    {
		$maxSamples = 10;
        return app('db')->select("SELECT * FROM accel_sample ORDER BY timestamp ASC LIMIT {$maxSamples}");
    }

	public function newRawSample(Request $request)
	{
		$data = $request->input();
		foreach ($data as $key => $value) {
			/*** IN HERE WE CAN DO VALIDATION OF INPUTS ***/
		}

		app('db')->table('normal_sample')->insert([
			[
				'timestamp'  => $data['timestamp'],
				'body_temp'  => $data['body_temp'],
				'ext_temp'   => $data['ext_temp'],
				'heart_rate' => $data['heart_rate'],
				'error'		 => $data['error'],
				'cow_id'	 => $data['cow_id']
			]	
		]);
	}
}
