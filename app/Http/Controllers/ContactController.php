<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
	public function index(){
		$data = [
			"Q" => Contact::first()
		];
		return view('page.contact',$data);
	}
	public function insContact(Request $request){
		$data = $request->all();
		var_dump($data);
		unset($data['_token']);
		unset($data['id']);
		try {

			if (empty($request->id)) {
				$init = new Contact($data);
				$ex = $init->save();
			}else{
				$ex = Contact::whereid($request->id)->update($data);
			}

			if ($ex) {
				return redirect('/contact')->with(['msg' => 'Berhasil', 'status' => true]);
			} else {
				return redirect('/contact')->with(['msg' => 'Gagal', 'status' => false]);
			}


		} catch (\GuzzleHttp\Exception\ClientException $e) {
			return redirect('/contact')->with(['msg' => 'Gagal', 'status' => false]);
		}
	}
}
