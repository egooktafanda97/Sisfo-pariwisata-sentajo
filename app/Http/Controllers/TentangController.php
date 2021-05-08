<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tentang;

use App\Models\Visi_misi;
use App\Models\Tim;

class TentangController extends Controller
{
	public function index(){
		$data = [
			"Q" => Tentang::all(),
			"Q2" => Visi_misi::first()
		];
		return view('page.addItemProfile',$data);
	}
	public function proses_data_tentang(Request $request){
		$data = $request->all();
		if(empty($data['id'])){
			unset($data['_token']);
			unset($data['id']);
			$init = new Tentang($data);
			$ex = $init->save();
		}else{
			unset($data['_token']);
			unset($data['id']);
			$ex = Tentang::whereid($request->id)->update($data);
		}

		if ($ex) {
			return response()->json(["status" => 200, "msg" => "berhasil"]);
		} else {
			return response()->json(["status" => 409, "msg" => "gagal"]);
		}
	}
	public function getDataTentang(Request $req){
		$data = Tentang::whereid($req->id)->first();

		return response()->json($data);

	}	
	public function hapusTentang(Request $req){
		$ex = Tentang::whereid($req->id)->delete();
		if ($ex) {
			return response()->json(["status" => 200, "msg" => "berhasil"]);
		} else {
			return response()->json(["status" => 409, "msg" => "gagal"]);
		}
	}

	public function public_tentang(){
		$data = [
			"Q" => Tentang::all(),
			"Q2" => Visi_misi::first(),
			"Q3" => Tim::all()
		];
		return view('tentang',$data);
	}
}
