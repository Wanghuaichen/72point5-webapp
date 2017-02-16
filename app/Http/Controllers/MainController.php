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
        return app('db')->select("SELECT * FROM normal_sample ORDER BY timestamp DESC LIMIT {$maxSamples}");
    }

    public function getAccelSamples() 
    {
		$maxSamples = 10;
        return app('db')->select("SELECT * FROM accel_sample ORDER BY timestamp DESC LIMIT {$maxSamples}");
    }

	public function newRawSample(Request $request)
	{
		$NORMAL_SAMPLE_TYPE = 3;
		$ACCEL_SAMPLE_TYPE = 4;

		$data = $request->input();
		foreach ($data as $key => $value) {
			/*** IN HERE WE CAN DO VALIDATION OF INPUTS ***/
		}

		if ($data['packetType'] == $NORMAL_SAMPLE_TYPE) {
			app('db')->table('normal_sample')->insert([
				[
					'timestamp'  => time(), //$data['timestamp'],
					'body_temp'  => hexdec(($data['objtemp_h'] << 8) | $data['objtemp_l']),
					'ext_temp'   => hexdec(($data['ambtemp_h'] << 8) | $data['ambtemp_l']),
					'heart_rate' => hexdec(($data['hrate_high'] << 8) | $data['hrate_low']),
					'error'		 => $data['errcode'],
					'cow_id'	 => $data['cowID']
				]	
			]);

		} else if ($data['packetType'] == $ACCEL_SAMPLE_TYPE) {
			$total = sqrt(pow($data['xaxis'], 2) + pow($data['yaxis'], 2) + pow($data['zaxis'], 2));

			app('db')->table('accel_sample')->insert([
				[
					'timestamp'  => time(), //$data['timestamp'],
					'x'			 => $data['xaxis'] / $total,
					'y'			 => $data['yaxis'] / $total,
					'z'			 => $data['zaxis'] / $total,
					'error'		 => $data['errcode'],
					'cow_id'	 => $data['cowID']
				]	
			]);
		}
	}
}
