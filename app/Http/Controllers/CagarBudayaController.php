<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CagarBudaya;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Support\Str;
class CagarBudayaController extends Controller
{
	public function index(){
		$data = [
			"Q" => CagarBudaya::orderBy('created_at','DESC')->paginate(5)
		];
		return view('page.CagarBudaya',$data);
	}
	public function formCagar($id = null){
		$data = [
			"Q" => CagarBudaya::whereid($id)->first()
		];
		return view('page.InsCagar',$data);
	}
	public function seendCagar(Request $request){

		try {
			$validator = Validator::make($request->all(), [
				'nama_situs'	 => 'required',
				'alamat'		 => 'required',
				"kecamatan" 	 => 'required',
			]);
			if ($validator->fails()) {
				return response()->json(["status" => 500, "msg" => $validator->errors()]);
			}
			$data = $request->all();
			unset($data['_token']);
			unset($data['id']);
			unset($data['gambar']);
			$image_name = '';

			if ($request->hasFile('gambar')) {
				$validator = Validator::make($request->all(), [
					"gambar"		 => 'required|image|mimes:jpeg,png,jpg,gif,svg',
				]);
				if ($validator->fails()) {
					return response()->json(["status" => 500, "msg" => $validator->errors()]);
				}

				$image = $request->file('gambar');
				$image_name = Str::random().time() . '.' . $image->getClientOriginalExtension();
				$destinationPath = public_path('/Images_assets/cagar_budaya');
				$image->move($destinationPath, $image_name);
			}

			$data = $data+["gambar" => $image_name,"_sts" => 1];

			switch ($request->id) {
				case !'':
				if(empty($image_name) || $image_name == ''){
					unset($data['gambar']);
				}
				$exe = CagarBudaya::whereid($request->id)->update($data);
				break;
				default:

				$init = new CagarBudaya($data);
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
	public function deleteCagar(Request $request){
		try {
			$validator = Validator::make($request->all(), [
				'id'	 => 'required',
			]);
			if ($validator->fails()) {
				return response()->json(["status" => 500, "msg" => $validator->errors()]);
			}


			$exe = CagarBudaya::whereid($request->id)->delete();

			if ($exe) {
				return response()->json(["status" => 200, "msg" => "berhasil"]);
			} else {
				return response()->json(["status" => 409, "msg" => "gagal"]);
			}

		} catch (\GuzzleHttp\Exception\ClientException $e) {
			return response()->json(["status" => 500, "msg" => "gagal"]);
		}
	}
	public function detail($id){
		$data = [
			"Q" => CagarBudaya::whereid($id)->first()
		];
		return view('page.detailCagarBudaya',$data);
	}
}
