<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tim;

class TimController extends Controller{

	public function addTim(){
		$data = [
			"Q" => Tim::all()
		];
		return view('page.addTim',$data);
	}
	public function inpTim(Request $request){
		$data = $request->all();
		unset($data['_token']);
		unset($data['foto']);
		unset($data['id']);
		try {

			if ($request->hasFile('foto')) {
				$image = $request->file('foto');
				$name = time() . '.' . $image->getClientOriginalExtension();
				$destinationPath = public_path('/tim');
				$image->move($destinationPath, $name);
				$images_name = $name;

				if (empty($request->id)) {
					$data = $data + ["foto" => $name];
					$init = new Tim($data);
					$ex = $init->save();
				}else{
					$data = $data + ["foto" => $name];
					$ex = Tim::whereid($request->id)->update($data);
				}

			}else{
				if (!empty($request->id)) {
					$data = $data;
					$ex = Tim::whereid($request->id)->update($data);
				}else{
					return redirect('/addTim/')->with(['msg' => 'Gagal', 'status' => false]);
				}
			}

			if ($ex) {
				return redirect('/addTim/')->with(['msg' => 'Berhasil', 'status' => true]);
			} else {
				return redirect('/addTim/')->with(['msg' => 'Gagal', 'status' => false]);
			}


		} catch (GuzzleHttp\Exception\ClientException $e) {
			return redirect('/addTim/')->with(['msg' => 'Gagal', 'status' => false]);
		}

	}
	public function getDataTim(Request $request){
		try {
			$Q = Tim::whereid($request->id)->first();
			return response()->json($Q);
			
		} catch (GuzzleHttp\Exception\ClientException $e) {
			
		}
	}
	public function deleteTim(Request $request){
		$bol = Tim::where(["id" => $request->id])->delete();

        if ($bol) {
            return response()->json(["status" => 200, "msg" => "berhasil"]);
        } else {
            return response()->json(["status" => 409, "msg" => "gagal"]);
        }
	}
}
