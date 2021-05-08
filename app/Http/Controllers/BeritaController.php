<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    public function index($id = null)
    {
        $data = [
            "Q" => Berita::whereid($id)->first(),
        ];
        return view('page.Input_berita', $data);
    }
    public function getBerita()
    {
        $data = [

            "Q" => Berita::all(),

        ];
        return view('page.list_berita', $data);
    }

    public function save_berita(Request $request)
    {
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
                "content" => $data['content'],
                "status" => 1,
                "viwer" => 0,
            ];
            if (!empty($data['id'])) {
                $boll = Berita::whereid($data['id'])->update($_data);
            } else {
                $yy = new Berita($_data);
                $boll = $yy->save();
            }

        } elseif (!empty($data['id'])) {

            $_data = [
                "user_id" => Auth::user()->id,
                "title" => $data['judul'],
                "content" => $data['content'],
                "status" => 1,
                "viwer" => 0,
            ];
            $boll = Berita::whereid($data['id'])->update($_data);
        }

        if ($boll) {
            return response()->json(["status" => 200, "msg" => "berhasil"]);
        } else {
            return response()->json(["status" => 409, "msg" => "gagal"]);
        }

    }
    public function deleteBerita(Request $request)
    {
        $bol = Berita::where(["id" => $request->id])->delete();

        if ($bol) {
            return response()->json(["status" => 200, "msg" => "berhasil"]);
        } else {
            return response()->json(["status" => 409, "msg" => "gagal"]);
        }
    }

    // berita client =============== 
    public function publicBerita()
    {
        $data = [

            "Q" => Berita::where(['status'=> '1'])->orderBy('created_at','DESC')->paginate(8),

        ];
        return view('berita', $data);
    }
    public function getViewBerita($id = null,$slug=null){
        if(empty($id)){
            return redirect('/');
        }
        $data = [
            "Q" => Berita::whereid($id)->first(),
            "id"=> $id,
            "id_coment" => $slug
        ];
        $v = $data['Q']['viwer'] + 1;
        Berita::whereid($id)->update(["viwer"=> $v]);
        return view('view_berita',$data);
    }
    public function visibilityBerita(Request $request){
        $boll =  Berita::whereid($request->id)->update(["status" => $request->status == '1' ? '0':'1']);
        if ($boll) {
            return response()->json(["status" => 200, "msg" => "berhasil"]);
        } else {
            return response()->json(["status" => 409, "msg" => "gagal"]);
        }
    }
}
