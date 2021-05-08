<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Wisata;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Str;

class WisataController extends Controller
{
	public function index($cari = null)
	{
		$q = DB::table('wisata')
			->select(DB::raw('*, kecamatan.nama as nama_kec , kelurahan.nama as nama_desa'))
			->join('kecamatan', function ($join) {
				$join->on('kecamatan.id_kec', '=', 'wisata.kecamatan');
			})
			->join('kelurahan', function ($join) {
				$join->on('kelurahan.id_kel', '=', 'wisata.desa');
			})
			->where('wisata.nama_wisata', 'like', '%'.$cari.'%')
			->orWhere('kecamatan.nama', 'like', '%'.$cari.'%')
			->orWhere('kelurahan.nama', 'like', '%'.$cari.'%')
			->paginate(5);
		$data = [
			"Q" => $q,
			"cari" => $cari
		];
		return view('page.wisata', $data);
	}
	public function formWisata($id = null)
	{
		$data = [
			"Q" => Wisata::whereid($id)->first()
		];
		return view('page.Inswisata', $data);
	}
	public function seendWisata(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'nama_wisata'	 => 'required',
				'alamat'		 => 'required',
				"kecamatan" 	 => 'required',
				"desa" 			 => 'required',
			]);
			if ($validator->fails()) {
				return response()->json(["status" => 500, "msg" => $validator->errors()]);
			}
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
				$destinationPath = public_path('/Images_assets/wisata');
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
				$destinationPath = public_path('/Images_assets/vidio_wisata');
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
					$exe = Wisata::whereid($request->id)->update($data);
					break;
				default:

					$init = new Wisata($data);
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
	public function deleteItem(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'id'	 => 'required',
			]);
			if ($validator->fails()) {
				return response()->json(["status" => 500, "msg" => $validator->errors()]);
			}


			$exe = Wisata::whereid($request->id)->delete();
			if ($exe) {
				return response()->json(["status" => 200, "msg" => "berhasil"]);
			} else {
				return response()->json(["status" => 409, "msg" => "gagal"]);
			}
		} catch (\GuzzleHttp\Exception\ClientException $e) {
			return response()->json(["status" => 500, "msg" => "gagal"]);
		}
	}
	public function detailItem($id)
	{
		$data = [
			"Q" => Wisata::whereid($id)->first(),
		];
		return view('page.detailWisata', $data);
	}
}
