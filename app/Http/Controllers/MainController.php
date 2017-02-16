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
					'timestamp'  => $data['timestamp'],
					'body_temp'  => (($data['objtemp_h'] & 0xff) << 8) | ($data['objtemp_l'] & 0xff),
					'ext_temp'   => (($data['ambtemp_h'] & 0xff) << 8) | ($data['ambtemp_l'] & 0xff),
					'heart_rate' => (($data['hrate_high'] & 0xff) << 8) | ($data['hrate_low'] & 0xff),
					'error'		 => $data['errcode'],
					'cow_id'	 => $data['cowID']
				]	
			]);

		} else if ($data['packetType'] == $ACCEL_SAMPLE_TYPE) {
			app('db')->table('accel_sample')->insert([
				[
					'timestamp'  => $data['timestamp'],
					'x'			 => $data['xaxis'],
					'y'			 => $data['yaxis'],
					'z'			 => $data['zaxis'],
					'error'		 => $data['errcode'],
					'cow_id'	 => $data['cowID']
				]	
			]);
		}
	}
}
