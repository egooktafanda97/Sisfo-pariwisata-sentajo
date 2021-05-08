<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patner;

class PatnerController extends Controller
{
	public function index(){
		$data = [
			"Q" => Patner::all()
		];
		return view('page.patner',$data);
	}
	public function savepatner(Request $request){
		$data = $request->all();

		try {

			$data = $request->all();

			if ($request->hasFile('logo')) {
				$this->validate($request, [
					'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,ico|max:2048',
				]);

				$image = $request->file('logo');
				$name = time() . '.' . $image->getClientOriginalExtension();
				$destinationPath = public_path('/patner');
				$image->move($destinationPath, $name);

				$_data = [
					'logo'		=> $name,
					'nama'		=> $data['nama'],
					'keterangan'	=> $data['keterangan'],
					'website'	=> $data['website']
				];
				if (!empty($data['id'])) {
					$boll =  Patner::whereid($data['id'])->update($_data);
				} else {
					unset($data['_token']);
					unset($data['id']);
					$yy = new  Patner($_data);
					$boll = $yy->save();
				}

			} elseif (!empty($data['id'])) {

				$_data = [
					'nama'		=> $data['nama'],
					'keterangan'	=> $data['keterangan'],
					'website'	=> $data['website']
				];
				$boll =  Patner::whereid($data['id'])->update($_data);
			}else{
				$boll = false;
			}

			if ($boll) {
				return response()->json(["status" => 200, "msg" => "berhasil"]);
			} else {
				return response()->json(["status" => 409, "msg" => "gagal"]);
			}



		} catch (\GuzzleHttp\Exception\ClientException $e) {
			return response()->json(["status" => 500, "msg" => "gagal"]);
		}
	}
	public function getpatneredit(Request $request){
		$Q = Patner::whereid($request->id)->first();
		return response()->json($Q);
	}
}
