<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budaya;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Support\Str;

class BudayaController extends Controller
{
	public function index()
	{
		$data = [
			"Q" => Budaya::orderBy('created_at', 'DESC')->paginate(5)
		];
		return view('page.Budaya', $data);
	}
	public function formBudaya($id = null)
	{
		$data = [
			"Q" => Budaya::whereid($id)->first()
		];
		return view('page.InsBudaya', $data);
	}
	public function seendBudaya(Request $request)
	{
		try {
			$data = $request->all();
			unset($data['_token']);
			unset($data['id']);
			unset($data['gambar']);
			unset($data['vidio']);
			$image_name = '';
			$vidio_name = '';

			if ($request->hasFile('gambar')) {
				$validator = Validator::make($request->all(), [
					"gambar"		 => 'required|image|mimes:jpeg,png,jpg,gif,svg',
				]);
				if ($validator->fails()) {
					return response()->json(["status" => 500, "msg" => $validator->errors()]);
				}

				$image = $request->file('gambar');
				$image_name = Str::random() . time() . '.' . $image->getClientOriginalExtension();
				$destinationPath = public_path('/Images_assets/budaya');
				$image->move($destinationPath, $image_name);
			}
			if ($request->hasFile('vidio')) {
				$validator = Validator::make($request->all(), [
					"vidio" 		 => 'mimes:m4v,avi,mp4,mov,mpg,mpeg',
				]);
				if ($validator->fails()) {
					return response()->json(["status" => 500, "msg" => $validator->errors()]);
				}
				$image = $request->file('vidio');
				$vidio_name = Str::random() . time() . '.' . $image->getClientOriginalExtension();
				$destinationPath = public_path('/Images_assets/vidio_budaya');
				$image->move($destinationPath, $vidio_name);
			}

			$data = $data + ["gambar" => $image_name, "vidio" => $vidio_name, "_sts" => 1];

			switch ($request->id) {
				case !'':
					if (empty($image_name) || $image_name == '') {
						unset($data['gambar']);
					}
					if (empty($vidio_name) || $vidio_name == '') {
						unset($data['vidio']);
					}
					$exe = Budaya::whereid($request->id)->update($data);
					break;
				default:

					$init = new Budaya($data);
					$exe  = $init->save();

					break;
			}

			if ($exe) {
				return response()->json(["status" => 200, "msg" => "berhasil"]);
			} else {
				return response()->json(["status" => 409, "msg" => "gagal"]);
			}
		} catch (\GuzzleHttp\Exception\ClientException $e) {
			return response()->json(["status" => 500, "msg" => "gagal"]);
		}
	}
	public function detailBudaya($id)
	{

		$data = [
			"Q" => Budaya::whereid($id)->first()
		];
		return view('page.detailBudaya', $data);
	}
	public function deleteBudaya(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'id'	 => 'required',
			]);
			if ($validator->fails()) {
				return response()->json(["status" => 500, "msg" => $validator->errors()]);
			}


			$exe = Budaya::whereid($request->id)->delete();
			if ($exe) {
				return response()->json(["status" => 200, "msg" => "berhasil"]);
			} else {
				return response()->json(["status" => 409, "msg" => "gagal"]);
			}
		} catch (\GuzzleHttp\Exception\ClientException $e) {
			return response()->json(["status" => 500, "msg" => "gagal"]);
		}
	}
}
