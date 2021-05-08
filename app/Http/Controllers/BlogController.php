<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blog;
use Illuminate\Support\Facades\Auth;
class BlogController extends Controller
{
	public function entryBlog($id = null){
		$data = [
			"kategori" => blog::all()->groupBy('category'),
			"Q" => blog::whereid($id)->first(),
		];
		return view('page.entryBlog',$data);
	}
	public function content(Request $request){
		// return json_encode($req->all());
		try {

			$data = $request->all();

			if ($request->hasFile('thumbnail')) {
				$this->validate($request, [
					'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
					'judul' => 'required',
					'content' => 'required',
				]);

				$image = $request->file('thumbnail');
				$name = time() . '.' . $image->getClientOriginalExtension();
				$destinationPath = public_path('/thm_berita');
				$image->move($destinationPath, $name);

				$_data = [
					"user_id" => Auth::user()->id,
					"thumbnail" => $name,
					"title" => $data['judul'],
					"category" => $data['category'],
					"content" => $data['content'],
					"status" => 1,
					"viwer" => 0,
				];
				if (!empty($data['id'])) {
					$boll =  blog::whereid($data['id'])->update($_data);
				} else {
					$yy = new  blog($_data);
					$boll = $yy->save();
				}

			} elseif (!empty($data['id'])) {

				$_data = [
					"user_id" => Auth::user()->id,
					"title" => $data['judul'],
					"category" => $data['category'],
					"content" => $data['content'],
					"status" => 1,
					"viwer" => 0,
				];
				$boll =  blog::whereid($data['id'])->update($_data);
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

	public function admBlog(){
		$data = [
			"kategori" => blog::all()->groupBy('category'),
			"Q" => blog::orderBy('created_at','DESC')->paginate(5)
		];
		return view('page.listBlog', $data);
	}
	public function deleteBlog(Request $request)
	{
		$bol = blog::where(["id" => $request->id])->delete();

		if ($bol) {
			return response()->json(["status" => 200, "msg" => "berhasil"]);
		} else {
			return response()->json(["status" => 409, "msg" => "gagal"]);
		}
	}
	public function visibility(Request $request){
		$boll =  blog::whereid($request->id)->update(["status" => $request->status == '1' ? '0':'1']);
		if ($boll) {
			return response()->json(["status" => 200, "msg" => "berhasil"]);
		} else {
			return response()->json(["status" => 409, "msg" => "gagal"]);
		}
	}

}
