<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Visi_misi;

class VisiMisiController extends Controller{
	public function visi_misi(Request $req){

		$data = [
			"visi" => $req->visi,
			"misi" => $req->misi
		];

		$val = Visi_misi::all();
		if($val->count() > 0 ){
			$get = Visi_misi::first();
			if(!empty($data['visi']) && empty($data['misi'])){
				unset($data['misi']);
			}else if(!empty($data['misi']) && empty($data['visi'])){
				unset($data['visi']);
			}else{
				return response()->json(["status" => 409, "msg" => "gagal"]);
				die();
			}

			$ex = Visi_misi::query()->update($data);

		}else{

			$ins = new Visi_misi($data);
			$ex  = $ins->save();


		}

		if ($ex) {
			return response()->json(["status" => 200, "msg" => "berhasil"]);
		} else {
			return response()->json(["status" => 409, "msg" => "gagal"]);
		}


	}

	public function profile_image(Request $request){

		if ($request->hasFile('images')) {
			$image = $request->file('images');
			$name = time() . '.' . $image->getClientOriginalExtension();
			$destinationPath = public_path('/profile');
			$image->move($destinationPath, $name);
			$images_name = $name;
			
			$data = [
				"image" => $name
			];

			$val = Visi_misi::all();
			if($val->count() > 0 ){
				$ex = Visi_misi::query()->update($data);
			}else{

				$ins = new Visi_misi($data);
				$ex  = $ins->save();
			}

			if ($ex) {
				return response()->json(["status" => 200, "msg" => "berhasil"]);
			} else {
				return response()->json(["status" => 409, "msg" => "gagal"]);
			}
		}
		
	}
}
