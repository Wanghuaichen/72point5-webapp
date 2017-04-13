<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

class MainController extends Controller
{
	private $NORMAL_SAMPLE_TYPE;
	private $ACCEL_SAMPLE_TYPE;

	public function __construct()
	{
		$this->NORMAL_SAMPLE_TYPE = 3;
		$this->ACCEL_SAMPLE_TYPE = 4;
	}

	public function viewHome()
	{
		return view('layouts/home');
	}

	public function createCSV()
	{
		// get all samples and create csv file
		$normal_samples = app('db')->select("SELECT * FROM normal_sample ORDER BY timestamp DESC");
		$accel_samples = app('db')->select("SELECT * FROM accel_sample ORDER BY timestamp DESC");
		$filename = "cowSamples.csv";
		$file = fopen($filename, "w");

		// set column headers
		$normal_header = array_keys((array)$normal_samples[0]);
		$accel_header = array_keys((array)$accel_samples[0]);

		// write normal samples
		fputcsv($file, ["Normal Samples"]);
		fputcsv($file, $normal_header);
		foreach ($normal_samples as $sample) {
			fputcsv($file, (array)$sample);
		}

		fputcsv($file, [""]);

		// write acceleometer samples
		fputcsv($file, ["Acceleration Samples"]);
		fputcsv($file, $accel_header);
		foreach ($accel_samples as $sample) {
			fputcsv($file, (array)$sample);
		}

		fclose($file);
	}

	public function getNumCows() {
		return app('db')->select("SELECT id FROM cow");
	}

	public function getLatestSamples()
	{
		$maxSamples = 10;
		$samples['normal'] = app('db')->select("SELECT * FROM normal_sample ORDER BY timestamp DESC LIMIT {$maxSamples}");
		$samples['accel'] = app('db')->select("SELECT * FROM accel_sample ORDER BY timestamp DESC LIMIT {$maxSamples}");
		return $samples;
	}

	public function getSingleSamples(Request $req)
	{
		$cow_id = $req->json()->get('cowId');
		$cow['normal'] = app('db')->select("SELECT * FROM normal_sample WHERE cow_id = {$cow_id} ORDER BY timestamp DESC");
		$cow['accel'] = app('db')->select("SELECT * FROM accel_sample WHERE cow_id = {$cow_id} ORDER BY timestamp DESC");
		return $cow;
	}

	public function newSample(Request $request)
	{
		$data = $request->input();
		foreach ($data as $key => $value) {
			/*** IN HERE WE CAN DO VALIDATION OF INPUTS ***/
		}

		if ((int)$data['packetType'] == $this->NORMAL_SAMPLE_TYPE) {
			if (!$this->isDuplicate($data)) {
				app('db')->table('normal_sample')->insert([
					[
						'timestamp'  => $data['timestamp'],
						'body_temp'  => $data['objtemp_l'],
						'ext_temp'   => $data['ambtemp_l'],
						'heart_rate' => $data['hrate_low'],
						'error'		 => $data['errcode'],
						'cow_id'	 => $data['cowID']
					]	
				]);
			} else {
				return; // duplicate sample 
			}

		} else if ((int)$data['packetType'] == $this->ACCEL_SAMPLE_TYPE) {
			var_dump("ACEL");
			if (!$this->isDuplicate($data)) {
				$total = sqrt(pow($data['xaxis'], 2) + pow($data['yaxis'], 2) + pow($data['zaxis'], 2));

				app('db')->table('accel_sample')->insert([
					[
						'timestamp'  => $data['timestamp'],
						'x'			 => $data['xaxis'] / $total,
						'y'			 => $data['yaxis'] / $total,
						'z'			 => $data['zaxis'] / $total,
						'error'		 => $data['errcode'],
						'cow_id'	 => $data['cowID']
					]	
				]);
			} else {
				return; // duplicate sample
			}
		}

		$this->createCSV();
	}

	// check to see if a sample already exists in the db
	private function isDuplicate($sample)
	{
		if ((int)$sample['packetType'] == $this->NORMAL_SAMPLE_TYPE) {
			$check = app('db')->select("SELECT * FROM normal_sample WHERE cow_id = {$sample['cowID']} AND timestamp = {$sample['timestamp']}");
			return !empty($check);
			
		} else if ((int)$sample['packetType'] == $this->ACCEL_SAMPLE_TYPE) {
			$check = app('db')->select("SELECT * FROM accel_sample WHERE cow_id = {$sample['cowID']} AND timestamp = {$sample['timestamp']}");
			return !empty($check);

		} else {
			return true; // weird packet type, ignore
		}
	}
}
